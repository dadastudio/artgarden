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

use Mcamara\LaravelLocalization\Interfaces\LocalizedUrlRoutable;
use Spatie\Sluggable\HasTranslatableSlug;
use Spatie\Sluggable\SlugOptions;
class Post extends Model implements Sortable, HasMedia, LocalizedUrlRoutable
{
	//
	use SortableTrait;

	use HasFactory;

	use HasTranslations;
	use HasTranslatableSlug;

	use InteractsWithMedia;
	protected $fillable = [

		'title',
		'slug',
		'text',
		'order_column',
		'meta_description',

		'enabled',

	];

	public $translatable = ['title', 'text', 'slug', 'meta_description',];
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
		if (request()->is('admin*') || request()->is('livewire*')) {
			return "id";
		}
		return 'slug->' . app()->getLocale();


	}

	public function getSlugOptions(): SlugOptions
	{

		return SlugOptions::createWithLocales(['en', 'pl'])
			->generateSlugsFrom(function ($model, $locale) {
				return $model->title;
			})
			->saveSlugsTo('slug');




	}

	// To implement \Mcamara\LaravelLocalization\Interfaces\LocalizedUrlRoutable, one has to create the function getLocalizedRouteKey($locale), which must return for a given locale the translated slug. In the above example, inside the model article, getLocalizedRouteKey('en') should return important-change and getLocalizedRouteKey('es') should return cambio-importante.
	public function getLocalizedRouteKey($locale)
	{
		return $this->getTranslation('slug', $locale);
	}

	//To use route-model-binding, one should overwrite the function resolveRouteBinding($slug) in the model. The function should return the model that belongs to the translated slug $slug.
	public function resolveRouteBinding($value, $field = null)
	{

		return static::where('slug->' . app()->getLocale(), $value)->first() ?? abort(404);


	}



}
