<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ServiceResource\Pages;
use App\Filament\Resources\ServiceResource\RelationManagers;
use App\Models\Service;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use AbdulmajeedJamaan\FilamentTranslatableTabs\TranslatableTabs;

class ServiceResource extends Resource
{
	protected static ?string $model = Service::class;



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
	public static function form(Form $form): Form
	{
		return $form
			->schema([



				TranslatableTabs::make('anyLabel')
					->schema([
						Forms\Components\TextInput::make("title"),
						Forms\Components\RichEditor::make('intro')->label('Intro Text')->toolbarButtons(self::$rteButtons),
						Forms\Components\TextInput::make("subtitle"),
						Forms\Components\RichEditor::make('text_1')->label('Text Column 1')->toolbarButtons(self::$rteButtons),
						Forms\Components\RichEditor::make('text_2')->label('Text Column 2')->toolbarButtons(self::$rteButtons),
						Forms\Components\Textarea::make("meta_description")->label('Meta Description (SEO)')->disableGrammarly(),

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
				,



			])
			->defaultSort('order_column', 'asc')
			->reorderable('order_column')

			->filters([
				//
			])
			->actions([
				Tables\Actions\EditAction::make(),
				Tables\Actions\Action::make('Live')
					->url(fn(Service $record): string => route('offer', $record->slug))
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
		];
	}

	public static function getPages(): array
	{
		return [
			'index' => Pages\ListServices::route('/'),
			'create' => Pages\CreateService::route('/create'),
			'edit' => Pages\EditService::route('/{record}/edit'),
		];
	}
}
