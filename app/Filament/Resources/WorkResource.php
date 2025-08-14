<?php

namespace App\Filament\Resources;

use App\Filament\Resources\WorkResource\Pages;
use App\Filament\Resources\WorkResource\RelationManagers;
use App\Models\Work;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class WorkResource extends Resource
{
	protected static ?string $model = Work::class;

	protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

	public static function form(Form $form): Form
	{
		return $form
			->schema([


				Forms\Components\Tabs::make()->tabs([
					Forms\Components\Tabs\Tab::make('Title PL')
						->schema([
							Forms\Components\TextInput::make('title.pl')->label(''),
						]),

					Forms\Components\Tabs\Tab::make('Title EN')
						->schema([
							Forms\Components\TextInput::make('title.en')->label(''),
						]),
				]),


				Forms\Components\SpatieMediaLibraryFileUpload::make('Main Photo')

					->responsiveImages()
					->imageEditor()

					->imageEditorAspectRatios(['4:3', '3:4', '1:1']),
				Forms\Components\Select::make('post_id')
					->relationship(name: 'post', titleAttribute: 'title')


			])->columns(1);
	}

	public static function table(Table $table): Table
	{
		return $table
			->columns([

				Tables\Columns\Layout\Stack::make([
					// Columns




					Tables\Columns\SpatieMediaLibraryImageColumn::make("images")
						->conversion("main")->width("100%")->height(180)
						->label(""),

					Tables\Columns\TextColumn::make('title')
						->searchable(),
					// Tables\Columns\TextColumn::make('post.title')->label('Linked to '),
					// Tables\Columns\IconColumn::make('enabled')->boolean(),
				]),


			])
			->reorderable('order_column')

			->filters([
				//


			])
			->actions([
				Tables\Actions\EditAction::make(),
			])
			->bulkActions([
				Tables\Actions\BulkActionGroup::make([
					Tables\Actions\DeleteBulkAction::make(),
				]),
			])->contentGrid([
					'sm' => 2,
					'xl' => 3,
				])
		;
	}

	public static function getRelations(): array
	{
		return [
			//
		];
	}

	public static function getNavigationBadge(): ?string
	{
		return Work::all()->count();
	}

	public static function getPages(): array
	{
		return [
			'index' => Pages\ListWorks::route('/'),
			'create' => Pages\CreateWork::route('/create'),
			'edit' => Pages\EditWork::route('/{record}/edit'),
		];
	}
}
