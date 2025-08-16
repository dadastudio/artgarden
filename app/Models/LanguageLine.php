<?php

namespace App\Models;
use Spatie\Translatable\HasTranslations;


class LanguageLine extends \Spatie\TranslationLoader\LanguageLine
{

	// use HasTranslations;

	protected $fillable = [
		'group',
		'key',
		'text',
		'rich',
	];


}
