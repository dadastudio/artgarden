<?php

namespace App\Filament\Resources\PostResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PhotosRelationManager extends RelationManager
{
	protected static string $relationship = 'photos';

	public function form(Form $form): Form
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

	public function table(Table $table): Table
	{
		return $table
			->recordTitleAttribute('title')
			->columns([




				Tables\Columns\SpatieMediaLibraryImageColumn::make("images")
					->conversion("main")->width('100%')->height(150)
					->label(""),

				Tables\Columns\TextColumn::make('title')->grow()->searchable(),

			])
			->reorderable('order_column')

			->filters([
				//
			])
			->headerActions([
				Tables\Actions\CreateAction::make(),
			])
			->actions([
				Tables\Actions\EditAction::make(),
				Tables\Actions\DeleteAction::make(),
			])
			->bulkActions([
				Tables\Actions\BulkActionGroup::make([
					Tables\Actions\DeleteBulkAction::make(),
				]),
			]);
	}
}
