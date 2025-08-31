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

	protected static ?string $modelLabel = 'Photo';

	protected static ?string $pluralModelLabel = 'All Photos';

	protected static ?int $navigationSort = 3;

	protected static ?string $navigationIcon = 'heroicon-o-photo';

	public static function form(Form $form): Form
	{
		return $form
			->schema([
				// Forms\Components\TextInput::make('id')->disabled(),
				Forms\Components\TextInput::make('title')->translatableTabs(),


				Forms\Components\Toggle::make('is_hero')->label('Can be a hero image'),

				Forms\Components\SpatieMediaLibraryFileUpload::make('Photos Desktop')

					->responsiveImages()
					->imageEditor()
					->imageEditorAspectRatios(['4:3', '3:4', '1:1', '1440:860']),


				Forms\Components\SpatieMediaLibraryFileUpload::make('Photos Mobile')
					->visible(fn($get) => $get('is_hero'))
					->imageEditor()
					->conversion('hero_mobile')->collection("mobile")
					->imageEditorAspectRatios(['4:3', '3:4', '1:1']),


			])->columns(1);
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

			])->persistFiltersInSession()

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
	public static function getNavigationBadge(): ?string
	{
		return Photo::all()->count();
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
