<?php

namespace App\Console\Commands;

use App\Models\LanguageLine;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class ImportTranslations extends Command
{
	/**
	 * The name and signature of the console command.
	 *
	 * @var string
	 */
	protected $signature = 'translations:import {--path=resources/lang : Base path to lang directory}';

	/**
	 * The console command description.
	 *
	 * @var string
	 */
	protected $description = 'Import all translations from resources/lang into the database as LanguageLine records';

	public function handle(): int
	{
		$basePath = base_path($this->option('path'));
		if (!File::isDirectory($basePath)) {
			$this->error("Lang path not found: {$basePath}");
			return self::FAILURE;
		}

		$locales = collect(File::directories($basePath))
			->map(fn($dir) => basename($dir))
			->values();

		if ($locales->isEmpty()) {
			$this->warn('No locale directories found.');
			return self::SUCCESS;
		}

		$created = 0;
		$updated = 0;
		foreach ($locales as $locale) {
			$localeDir = $basePath . DIRECTORY_SEPARATOR . $locale;
			$files = collect(File::files($localeDir))
				->filter(fn($f) => $f->getExtension() === 'php')
				->values();

			foreach ($files as $file) {
				$group = pathinfo($file->getFilename(), PATHINFO_FILENAME);

				try {
					$items = File::getRequire($file->getPathname());
				} catch (\Throwable $e) {
					$this->warn("Failed to load {$file->getPathname()}: {$e->getMessage()}");
					continue;
				}

				if (!is_array($items)) {
					$this->warn("File does not return array: {$file->getPathname()}");
					continue;
				}

				$flat = $this->arrayDot($items);

				foreach ($flat as $key => $value) {
					// Normalize values to strings where possible; keep non-scalars as-is
					if (is_scalar($value)) {
						$valueToStore = (string) $value;
					} else {
						// Leave arrays/objects for pluralization or complex messages
						$valueToStore = $value;
					}

					$line = LanguageLine::firstOrNew([
						'group' => $group,
						'key' => $key,
					]);

					$existing = $line->text ?? [];
					$alreadyHad = $line->exists;

					// Merge/overwrite only this locale
					$existing[$locale] = $valueToStore;
					$line->text = $existing;

					// Set rich if current or any existing locale value contains HTML
					$isRich = $this->hasHtml($valueToStore) || (isset($line->rich) && (bool) $line->rich);
					$line->rich = $isRich;

					$line->save();

					if ($alreadyHad) {
						$updated++;
					} else {
						$created++;
					}
				}
			}
		}

		$this->info("Translations imported. Created: {$created}, Updated: {$updated}");
		return self::SUCCESS;
	}

	/**
	 * Flatten a multi-dimensional array using dot notation.
	 *
	 * @param array<mixed> $array
	 * @param string $prepend
	 * @return array<string,mixed>
	 */
	protected function arrayDot(array $array, string $prepend = ''): array
	{
		$results = [];

		foreach ($array as $key => $value) {
			$newKey = $prepend === '' ? (string) $key : $prepend . '.' . $key;

			if (is_array($value)) {
				$results += $this->arrayDot($value, $newKey);
			} else {
				$results[$newKey] = $value;
			}
		}

		return $results;
	}

	/**
	 * Detect if a value contains HTML tags. Handles strings and nested arrays.
	 *
	 * @param mixed $value
	 */
	protected function hasHtml(mixed $value): bool
	{
		if (is_string($value)) {
			return $value !== strip_tags($value);
		}

		if (is_array($value)) {
			foreach ($value as $child) {
				if ($this->hasHtml($child)) {
					return true;
				}
			}
		}

		return false;
	}
}
