<?php

namespace App\Filament\Resources\LanguageLineResource\Pages;

use App\Filament\Resources\LanguageLineResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditLanguageLine extends EditRecord
{
	protected static string $resource = LanguageLineResource::class;

	protected function getHeaderActions(): array
	{
		return [
			// Actions\DeleteAction::make(),
		];
	}

	// protected function mutateFormDataBeforeFill(array $data): array
	// {
	//     $filters = request()->query('tableFilters', []);

	//     // Example: if you had a SelectFilter('status'), copy it into the form’s `status` field
	//     if (isset($filters['status']['value']) && blank($data['status'] ?? null)) {
	//         $data['status'] = $filters['status']['value'];
	//     }

	//     // Do the same for any other fields you want to prefill...
	//     // if (isset($filters['category']['value'])) { $data['category_id'] = $filters['category']['value']; }

	//     return $data;
	// }


}
