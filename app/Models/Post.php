<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Builder;
use Spatie\EloquentSortable\Sortable;
use Spatie\EloquentSortable\SortableTrait;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\HasMedia;
use Spatie\Image\Enums\Fit;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Post extends Model implements HasMedia
{
	//
	use HasFactory;

	use HasTranslations;

	use InteractsWithMedia;
	protected $fillable = [

		'title',
		'slug',
		'text',
		'img',

		'enabled',

	];
	public $translatable = ['title', 'text'];
	public function next()
	{
		$nextProject = self::enabled()->where('id', '>', $this->id)->ordered()->first();
		return $nextProject ?? self::enabled()->ordered()->first();
	}

	public function prev()
	{
		$prevProject = self::enabled()->where('id', '<', $this->id)->ordered("desc")->first();
		return $prevProject ?? self::enabled()->ordered("desc")->first();
	}


	public function scopeEnabled(Builder $query): void
	{
		$query->where('enabled', 1);
	}


}
