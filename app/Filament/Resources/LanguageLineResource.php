<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LanguageLineResource\Pages;
use App\Filament\Resources\LanguageLineResource\RelationManagers;
use App\Models\LanguageLine;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Get;

class LanguageLineResource extends Resource
{
	protected static ?string $model = LanguageLine::class;

	protected static ?string $modelLabel = 'Translation';

	protected static ?string $pluralModelLabel = 'Translations';

	protected static ?string $navigationGroup = '__';


	protected static ?array $rteButtons = [

		'bold',
		'bulletList',

		'h2',
		'h3',
		'italic',
		'link',
		'orderedList',
		'redo',
		'strike',
		'underline',
		'undo',
	];
	protected static ?string $navigationIcon = 'heroicon-o-language';

	public static function form(Form $form): Form
	{
		return $form
			->schema([

				Forms\Components\Split::make([
					Forms\Components\TextInput::make('group')->disabled(),
					Forms\Components\TextInput::make('key')->disabled(),

				]),

				Forms\Components\Checkbox::make('rich')->label("Rich Text Editor")
					->live(),
				Forms\Components\Section::make('Translation')
					->visible(fn(Get $get): bool => !$get('rich'))

					->schema([
						Forms\Components\TextInput::make('text.pl')->required(),
						Forms\Components\TextInput::make('text.en')->required(),

					]),



				Forms\Components\Tabs::make()->tabs([
					Forms\Components\Tabs\Tab::make('Translation EN')
						->schema([
							Forms\Components\RichEditor::make('text.en')->label('')->toolbarButtons(self::$rteButtons),
						]),
					Forms\Components\Tabs\Tab::make('Translation PL')
						->schema([
							Forms\Components\RichEditor::make('text.pl')->label('')->toolbarButtons(self::$rteButtons),
						]),

				])->hidden(fn(Get $get): bool => !$get('rich')),



			])->columns(1);
	}

	public static function table(Table $table): Table
	{
		return $table
			->columns([
				Tables\Columns\TextColumn::make('key')->searchable()->sortable(),
				Tables\Columns\TextColumn::make('text')->lineClamp(2)->wrap()->html()->searchable()
					->separator(','),
			])
			->defaultGroup('group')

			->filters([

				Tables\Filters\SelectFilter::make('group')
					->options(LanguageLine::query()
						->groupBy('group')
						->pluck('group', 'group')
						->toArray())
					->label('Group Filter'),

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
		return LanguageLine::all()->count();
	}
	public static function getPages(): array
	{
		return [
			'index' => Pages\ListLanguageLines::route('/'),
			// 'create' => Pages\CreateLanguageLine::route('/create'),
			'edit' => Pages\EditLanguageLine::route('/{record}/edit'),
		];
	}
}
