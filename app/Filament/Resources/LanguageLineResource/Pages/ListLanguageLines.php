<?php

namespace App\Filament\Resources\LanguageLineResource\Pages;

use App\Filament\Resources\LanguageLineResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Livewire\Attributes\Url;
use Filament\Tables\Table;


use Filament\Tables\Actions\EditAction;


class ListLanguageLines extends ListRecords
{
	protected static string $resource = LanguageLineResource::class;




	protected function getHeaderActions(): array
	{
		return [
			Actions\CreateAction::make(),
		];
	}
}
