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
use AbdulmajeedJamaan\FilamentTranslatableTabs\TranslatableTabs;

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


				TranslatableTabs::make('anyLabel')
					->schema([
						Forms\Components\TextInput::make("title"),
						Forms\Components\RichEditor::make('text')->toolbarButtons(self::$rteButtons),

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
				// Tables\Columns\TextColumn::make('order_column')->sortable(),

				Tables\Columns\IconColumn::make('enabled')->label('')
					->boolean(),

			])->defaultSort('order_column', 'asc')
			->reorderable('order_column')

			->filters([
				//
			])
			->actions([
				Tables\Actions\EditAction::make(),
				Tables\Actions\Action::make('Live')
					->url(fn(Post $record): string => route('post', $record->slug))
					->icon('heroicon-m-link')
					->openUrlInNewTab()
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
