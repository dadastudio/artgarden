<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Validation\Rules\Password as PasswordRule;
use Illuminate\Support\Facades\Hash;

class UserResource extends Resource
{
	protected static ?string $model = User::class;
	protected static ?string $navigationIcon = 'heroicon-o-user-group';
	protected static ?string $navigationGroup = '__';

	public static function form(Form $form): Form
	{
		return $form
			->schema([
				//
				Forms\Components\TextInput::make('name')->label('Name')->required(),
				Forms\Components\TextInput::make('email')->label('Email')->required(),
				Forms\Components\TextInput::make('password')
					->label('Password')
					->password()
					->revealable()
					->autocomplete('new-password')
					->required(fn(string $context) => $context === 'create')
					->rule(PasswordRule::defaults())
					// Only send to model if user typed something
					->dehydrated(fn($state) => filled($state))
					// Hash before saving
					->dehydrateStateUsing(fn($state) => filled($state) ? Hash::make($state) : null)
					->hint('Leave blank to keep current password'),

				Forms\Components\TextInput::make('passwordConfirmation')
					->label('Confirm Password')
					->password()
					->revealable()
					->same('password')
					->dehydrated(false)
					->required(fn(string $context) => $context === 'create'),
			]);
	}

	public static function table(Table $table): Table
	{
		return $table
			->columns([
				//
				Tables\Columns\TextColumn::make('name')->label('Name'),
				Tables\Columns\TextColumn::make('email')->label('Email'),
			])
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
	public static function getNavigationBadge(): ?string
	{
		return User::all()->count();
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
			'index' => Pages\ListUsers::route('/'),
			'create' => Pages\CreateUser::route('/create'),
			'edit' => Pages\EditUser::route('/{record}/edit'),
		];
	}
}
