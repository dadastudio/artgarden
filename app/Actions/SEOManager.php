<?php

namespace App\Actions;

use Honeystone\Seo\Contracts\BuildsMetadata;
use Illuminate\Database\Eloquent\Collection;
use Spatie\SchemaOrg\ContactPoint;
use Spatie\SchemaOrg\Schema;
use Spatie\SchemaOrg\ItemAvailability;
use Session;
use App\Models\CaseItem;

use App\Models\Font;

class SEOManager
{

	public static function noindex(): void
	{

		seo()->robots("noindex, nofollow");

	}

	public static function title(string $title): void
	{

		seo()->title(StringUtils::sanitize($title));

	}

	public static function description(?string $description = null): void
	{

		if ($description)
			seo()->description(StringUtils::sanitize($description));

	}
	public static function onlineStore(): BuildsMetadata
	{
		$graph = Schema::onlineStore()

			->name(config('app.name'))
			->url(config('app.url'))

			->vatID("PL9511919298")

			->logo("ss.png") // to do

			->contactPoint(self::contactPoint())
		;

		return seo()->jsonLdImport($graph);

	}

	public static function getOffers($font)
	{
		$offers = [];

		$packs = $font->packs;

		foreach ($packs as $pack) {
			$offers[] = Schema::offer()
				->name($font->name . " - " . $pack->name . " Pack")

				->availability([ItemAvailability::OnlineOnly])

				->price(number_format($pack->multiplier * $font->price(), decimals: 2, thousands_separator: ""))

				->priceCurrency(Session::get("currency"));
		}

		$weights = $font->weights;

		foreach ($weights as $weight) {
			$offer = Schema::offer()
				->name($font->name . "  " . $weight->name)

				->availability([ItemAvailability::OnlineOnly])
				->priceCurrency(Session::get("currency"));

			if ($weight->free) {
				$offer->price("0");
			} else {
				$offer->price(number_format($font->price(), decimals: 2, thousands_separator: ""));
			}

			$offers[] = $offer;
		}

		return $offers;
	}
	public static function product($font): BuildsMetadata
	{
		$graph = Schema::product()

			->breadcrumb(self::breadcrumb($font))

			->name($font->name)
			->publisher(self::organization())

			->image("magiore.png") // to do
			->author($font->allDesigners)
			->offers(self::getOffers($font));

		return seo()->jsonLdImport($graph);

	}

	public static function blogPosting(CaseItem $case): BuildsMetadata
	{



		$caseImages = url("img/casestudy/{$case->slug}/{$case->img}");

		$graph = Schema::article()

			// ->breadcrumb(self::breadcrumb($font))
			->headline($case->title)
			// ->publisher(self::organization())
			->articleBody(StringUtils::sanitize($case->intro))
			->image($caseImages)
			// ->author(["afds"])
		;
		// dd($graph->toScript());
		return seo()->jsonLdImport($graph);

	}




	public static function itemList(Collection $models, string $routeName): BuildsMetadata
	{
		$items = [];
		foreach ($models as $model) {
			$items[] = Schema::listItem()
				->name($model->name)
				->url(route($routeName, $model->slug))
				->position(count($items) + 1)

			;
		}

		return seo()->jsonLdImport(Schema::itemList()->itemListElement($items));

	}


	public static function breadcrumb($font): \Spatie\SchemaOrg\BreadcrumbList
	{
		return Schema::breadcrumbList()->itemListElement([

			Schema::listItem()
				->position(1)
				->name('Home')
				->item(route('index')),

			Schema::listItem()
				->position(2)
				->name("Retail Fonts")
				->item(route("retailFonts")),
			Schema::listItem()
				->position(3)
				->name($font->name)
				->item(url()->current()),
		]);

	}

	public static function contactPoint(): ContactPoint
	{


		$phones = explode('+', strip_tags(__('contact.phones')));

		return Schema::contactPoint()
			->telephone('+' . $phones[1])

			->email(__('contact.email'))
			->contactType('customer support')
			->areaServed('Poland')
			->availableLanguage(['English', 'Polish']);
	}

	public static function organization()
	{

		return Schema::organization()
			->name(config('app.name'))
			->url(config('app.url'))
			// ->vatID("PL9511919298")
			// ->logo(asset('img/logo-512.png'))

			->logo(Schema::imageObject()->url(asset('img/logo-512.png')))
			->contactPoint(self::contactPoint());
	}

	protected static function localBusiness()
	{

		return Schema::localBusiness()
			->name(config('app.name'))

			->url(config('app.url'))
			// ->vatID("PL9511919298")
			// ->logo("logo.png")
			->contactPoint(self::contactPoint());
	}


}
