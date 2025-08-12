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
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Work extends Model implements Sortable, HasMedia
{
	use SortableTrait;
	use HasTranslations;

	use InteractsWithMedia;



	public $translatable = ['title'];


	protected $fillable = [

		'title',
		'post_id',
		'enabled',
		'order_column',

	];


	public function scopeEnabled(Builder $query): void
	{
		$query->where('enabled', 1);
	}
	public function post(): BelongsTo
	{
		return $this->belongsTo(Post::class);
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

}
