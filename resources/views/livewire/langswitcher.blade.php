<?php

use Livewire\Volt\Component;
use App\Models\Post;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

new class extends Component {
    //
    public $currentRouteName;

    public $currentRouteParameters;

    public $locales;
    public $isMenu = true;
    public $routes = [];

    public function mount(): void
    {
        $this->currentRouteName = Route::getCurrentRoute()->getName();
        $this->currentRouteParameters = Route::getCurrentRoute()->parameters();

        $this->locales = LaravelLocalization::getSupportedLocales();

        foreach ($this->locales as $localeCode => $properties) {
            $this->routes[$localeCode] = [
                'code' => $localeCode,
                'url' => LaravelLocalization::getLocalizedURL($localeCode, null, $this->currentRouteParameters, true),
            ];
        }
        if ($this->currentRouteName === 'post') {
            $this->routes = [];

            $category = Post::whereJsonContainsLocale('slug', App::currentLocale(), $this->currentRouteParameters['post']->slug)->first();

            // dd($category);

            $slugs = $category->getTranslations('slug');
            // dd($this->currentRouteParameters['post']);

            // dd($slugs);

            foreach ($this->locales as $localeCode => $properties) {
                $this->routes[$localeCode] = [
                    'code' => $localeCode,
                    'url' => LaravelLocalization::getLocalizedURL($localeCode, null, ['post' => $slugs[$localeCode]], true),
                ];
            }
        }
    }
}; ?>

<div class="{{ $isMenu ? 'lg:flex lg:h-full lg:items-center lg:border-l lg:border-gray-200 lg:px-5 xl:px-10' : '' }}">

	<flux:button class="{{ app()->getLocale() === 'pl' && $isMenu ? 'current' : '' }} {{ $isMenu ? 'max-sm:!text-base lg:!text-sm xl:!text-base' : '!text-sm !text-white' }}" href="{{ $routes['pl']['url'] }}" hreflang="{{ $routes['pl']['code'] }}" inset variant="ghost">PL</flux:button>

	<span class="{{ $isMenu ? 'max-sm:!text-base lg:!text-sm xl:!text-base' : '!text-sm !text-white' }}">&nbsp; / &nbsp;</span>

	<flux:button class="{{ app()->getLocale() === 'en' && $isMenu ? 'current' : '' }} {{ $isMenu ? 'max-sm:!text-base lg:!text-sm xl:!text-base' : '!text-sm !text-white' }}" href="{{ $routes['en']['url'] }}" hreflang="{{ $routes['en']['code'] }}" inset variant="ghost">EN</flux:button>

</div>
