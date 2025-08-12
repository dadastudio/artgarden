<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PostResource\Pages;
use App\Filament\Resources\PostResource\RelationManagers;
use App\Models\Post;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PostResource extends Resource
{
	protected static ?string $model = Post::class;

	protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
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

	// protected static ?string $recordTitleAttribute = 'id';



	public static function form(Form $form): Form
	{
		return $form
			->schema([


				Forms\Components\Tabs::make()->tabs([
					Forms\Components\Tabs\Tab::make('Title PL')
						->schema([
							Forms\Components\TextInput::make('title.pl')->label('')->live(onBlur: true)
								->afterStateUpdated(function (Forms\Set $set, ?string $state) {
									$set('slug.pl', str()->slug(($state)));
								}),
						]),

					Forms\Components\Tabs\Tab::make('Title EN')
						->schema([
							Forms\Components\TextInput::make('title.en')->label('')->live(onBlur: true)
								->afterStateUpdated(function (Forms\Set $set, ?string $state) {
									$set('slug.en', str()->slug(($state)));
								}),
						]),
				]),


				Forms\Components\Tabs::make()->tabs([
					Forms\Components\Tabs\Tab::make('slug PL')
						->schema([
							Forms\Components\TextInput::make('slug.pl')->label('')->helperText('automatically generated from Title PL')
							,
						]),
					Forms\Components\Tabs\Tab::make('slug EN')
						->schema([
							Forms\Components\TextInput::make('slug.en')->label('')->helperText('automatically generated from Title EN')
							,
						]),
				]),

				Forms\Components\Tabs::make("Text")->tabs([
					Forms\Components\Tabs\Tab::make('Text EN')
						->schema([
							Forms\Components\RichEditor::make('text.en')->label('')->toolbarButtons(self::$rteButtons),
						]),
					Forms\Components\Tabs\Tab::make('Text PL')
						->schema([
							Forms\Components\RichEditor::make('text.pl')->label('')->toolbarButtons(self::$rteButtons),
						]),

				]),

				Forms\Components\SpatieMediaLibraryFileUpload::make('Main Photo')

					->responsiveImages()
					->imageEditor()

					->imageEditorAspectRatios([
						'4:3',
						'3:4',
						'1:1',
					])
				,

				Forms\Components\Toggle::make('enabled')
				,
			])->columns(1);
	}

	public static function table(Table $table): Table
	{
		return $table
			->columns([

				Tables\Columns\SpatieMediaLibraryImageColumn::make("images")
					->conversion("preview")
					->label(""),

				Tables\Columns\TextColumn::make('title')->grow()
					->searchable(),
				Tables\Columns\TextColumn::make('order_column'),

				Tables\Columns\IconColumn::make('enabled')
					->boolean(),
				Tables\Columns\TextColumn::make('created_at')
					->since()->dateTimeTooltip()
					->sortable()
				,
				Tables\Columns\TextColumn::make('updated_at')
					->dateTime()
					->sortable()
					->toggleable(isToggledHiddenByDefault: true),
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
			]);
	}

	public static function getRelations(): array
	{
		return [
				//
			RelationManagers\PhotosRelationManager::class,
		];
	}
	public static function getNavigationBadge(): ?string
	{
		return Post::all()->count();
	}

	public static function getPages(): array
	{
		return [
			'index' => Pages\ListPosts::route('/'),
			'create' => Pages\CreatePost::route('/create'),
			'edit' => Pages\EditPost::route('/{record}/edit'),
		];
	}
}
