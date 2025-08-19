<?php

namespace App\Filament\Resources\LanguageLineResource\Pages;

use App\Filament\Resources\LanguageLineResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateLanguageLine extends CreateRecord
{
	protected static string $resource = LanguageLineResource::class;


	protected function afterFill(): void
	{
		// Runs before the form fields are populated with their default values.

		$this->form->fill([
			'group' => 'test',
		]);




	}


}
