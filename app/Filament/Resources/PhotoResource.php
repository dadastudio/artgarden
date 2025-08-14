<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PhotoResource\Pages;
use App\Filament\Resources\PhotoResource\RelationManagers;
use App\Models\Photo;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PhotoResource extends Resource
{
	protected static ?string $model = Photo::class;

	protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

	public static function form(Form $form): Form
	{
		return $form
			->schema([
				Forms\Components\Tabs::make()->tabs([
					Forms\Components\Tabs\Tab::make('Title PL')
						->schema([
							Forms\Components\TextInput::make('title.pl')->label('')
							,
						]),

					Forms\Components\Tabs\Tab::make('Title EN')
						->schema([
							Forms\Components\TextInput::make('title.en')->label('')
							,
						]),
				]),


				Forms\Components\SpatieMediaLibraryFileUpload::make('Photos')

					->responsiveImages()
					->imageEditor()

					->imageEditorAspectRatios(['4:3', '3:4', '1:1']),

			]);
	}

	public static function table(Table $table): Table
	{
		return $table
			->columns([
				//
				Tables\Columns\TextColumn::make('id')->label('ID')->sortable()->searchable(),

				Tables\Columns\SpatieMediaLibraryImageColumn::make("images")
					->conversion("preview")
					->label(""),

				Tables\Columns\TextColumn::make('title')->grow()->searchable(),
				Tables\Columns\TextColumn::make('post.title')->label('Linked to '),

			])
			->filters([
				//

				Tables\Filters\Filter::make('No post')
					->query(fn(Builder $query): Builder => $query->whereDoesntHave('post'))

					->label('Photos without linked post'),

			])
			->actions([
				Tables\Actions\EditAction::make(),
			])
			->bulkActions([
				Tables\Actions\BulkActionGroup::make([
					Tables\Actions\DeleteBulkAction::make(),
				]),
			]);
	}

	public static function getRelations(): array
	{
		return [
			//
		];
	}

	public static function getPages(): array
	{
		return [
			'index' => Pages\ListPhotos::route('/'),
			'create' => Pages\CreatePhoto::route('/create'),
			'edit' => Pages\EditPhoto::route('/{record}/edit'),
		];
	}
}
