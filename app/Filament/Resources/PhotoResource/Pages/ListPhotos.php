<?php

namespace App\Filament\Resources\PhotoResource\Pages;

use App\Filament\Resources\PhotoResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPhotos extends ListRecords
{
	protected static string $resource = PhotoResource::class;

	protected function getDefaultTableFiltersState(): array
	{
		return [
			'no_post' => true,
		];
	}

	protected function getHeaderActions(): array
	{
		return [
			// Actions\CreateAction::make(),
		];
	}
}
