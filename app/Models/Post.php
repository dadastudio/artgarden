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
use Illuminate\Database\Eloquent\Relations\HasMany;


class Post extends Model implements Sortable, HasMedia
{
	//
	use SortableTrait;

	use HasFactory;

	use HasTranslations;

	use InteractsWithMedia;
	protected $fillable = [

		'title',
		'slug',
		'text',
		'order_column',

		'enabled',

	];
	public $translatable = ['title', 'text', 'slug'];
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

	public function photos(): HasMany
	{
		return $this->hasMany(Photo::class)->ordered();
	}
	public function registerMediaConversions(Media|null $media = null): void
	{
		$this
			->addMediaConversion('preview')
			->fit(Fit::Contain, 40, 40)
			->nonQueued();


		$this->addMediaConversion('main')
			->fit(Fit::Contain, 950, 950)
			->withResponsiveImages()
			->nonQueued();
		;


	}

	public function getRouteKeyName()
	{
		if (request()->is('admin*')) {
			return "id";//$this->getKeyName(); // usually 'id'
		}
		return 'slug->' . app()->getLocale();


		return "id";
	}
}
