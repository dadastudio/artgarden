<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Spatie\Sitemap\Sitemap;
use Spatie\Sitemap\Tags\Url;
use App\Models\Post;
use App\Models\Service;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class GenerateSitemap extends Command
{
    protected $signature = 'sitemap:generate';
    protected $description = 'Generate the XML sitemap';

    public function handle(): void
    {
        $sitemap = Sitemap::create();

        $locales = array_keys(LaravelLocalization::getSupportedLocales());

        // Static pages
        $staticRoutes = ['index', 'blog', 'about', 'works', 'contact', 'offer', 'faq'];

        foreach ($staticRoutes as $routeName) {
            foreach ($locales as $locale) {
                $url = LaravelLocalization::getLocalizedURL($locale, route($routeName), [], true);
                $tag = Url::create($url)
                    ->setChangeFrequency(Url::CHANGE_FREQUENCY_WEEKLY)
                    ->setPriority($routeName === 'index' ? 1.0 : 0.8);

                foreach ($locales as $altLocale) {
                    $altUrl = LaravelLocalization::getLocalizedURL($altLocale, route($routeName), [], true);
                    $tag->addAlternate($altUrl, $altLocale);
                }

                $sitemap->add($tag);
            }
        }

        // Blog posts
        foreach (Post::enabled()->get() as $post) {
            foreach ($locales as $locale) {
                $slug = $post->getTranslation('slug', $locale);
                if (!$slug) {
                    continue;
                }

                app()->setLocale($locale);
                $url = LaravelLocalization::getLocalizedURL($locale, route('post', $slug), [], true);

                $tag = Url::create($url)
                    ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
                    ->setPriority(0.7);

                foreach ($locales as $altLocale) {
                    $altSlug = $post->getTranslation('slug', $altLocale);
                    if ($altSlug) {
                        app()->setLocale($altLocale);
                        $altUrl = LaravelLocalization::getLocalizedURL($altLocale, route('post', $altSlug), [], true);
                        $tag->addAlternate($altUrl, $altLocale);
                    }
                }

                $sitemap->add($tag);
            }
        }

        // Services (offer pages)
        foreach (Service::all() as $service) {
            foreach ($locales as $locale) {
                $slug = $service->getTranslation('slug', $locale);
                if (!$slug) {
                    continue;
                }

                app()->setLocale($locale);
                $url = LaravelLocalization::getLocalizedURL($locale, route('offers', $slug), [], true);

                $tag = Url::create($url)
                    ->setChangeFrequency(Url::CHANGE_FREQUENCY_MONTHLY)
                    ->setPriority(0.8);

                foreach ($locales as $altLocale) {
                    $altSlug = $service->getTranslation('slug', $altLocale);
                    if ($altSlug) {
                        app()->setLocale($altLocale);
                        $altUrl = LaravelLocalization::getLocalizedURL($altLocale, route('offers', $altSlug), [], true);
                        $tag->addAlternate($altUrl, $altLocale);
                    }
                }

                $sitemap->add($tag);
            }
        }

        // Reset locale
        app()->setLocale(config('app.locale'));

        $sitemap->writeToFile(public_path('sitemap.xml'));

        $this->info('Sitemap generated successfully.');
    }
}
