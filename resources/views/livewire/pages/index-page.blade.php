<?php

use App\Models\Post;
use App\Models\Service;
use App\Models\Photo;
use Livewire\Volt\Component;
use App\Actions\SEOManager;

new class extends Component {
    public function mount(): void
    {
        SEOManager::title(__('texts.about_header'));
        SEOManager::description(__('texts.about'));
    }
    public function with(): array
    {
        return [
            'blogItems' => Post::enabled()->ordered()->get(),
            'services' => Service::all(),

            'heroImg' => Photo::find(101),
            'ofertaImg' => Photo::find(102),
            'realizacjeImgs' => [Photo::find(105), Photo::find(106), Photo::find(107)],
        ];
    }
}; ?>

<x-ui.spacer class="lg:-mt-42 -mt-34" pb type="md">
	<div>
		<x-hero :$heroImg text="{{ __('texts.about') }}" title="{{ __('texts.about_header') }}" />

		{{-- <x-index.baner quoteAuthor="{{ __('quotes.q_1_a') }}" quote="{{ __('quotes.q_1') }}" /> --}}
	</div>

	<livewire:offer />

	<div>
		<x-index.baner quoteAuthor="{{ __('quotes.q_2_a') }}" quote="{{ __('quotes.q_2') }}" />

		{{-- WIANEK I KORSARZ --}}

		<div class="aspect-5/3 relative bg-[url(/public/img/sala.jpg)] bg-cover bg-center bg-no-repeat">

			<div class="xl:px-30 grid grid-cols-2 gap-2 px-5 py-5 sm:px-10 md:px-20 md:py-10 lg:px-24">
				<div class="col-start-1s col-end-3s">
					<div class="max-w-[320px] bg-white p-2 shadow-xl md:p-5">
						<img alt="Wianek i korsarz na rękę" class="" src="/img/wianek.jpg">
						<p class="mt-2.5 text-[10px] uppercase text-gray-600">wianek i korsarz na rękę</p>

					</div>
				</div>
				<div>&nbsp;</div>
				<div>&nbsp;</div>
				<div class="place-self-end">

					<div class="max-w-[300px] bg-white p-2 shadow-xl md:p-5">
						<img alt="Przypinka do marynarki" class="" src="/img/przypinka.jpg">
						<p class="mt-2.5 text-[10px] uppercase text-gray-600">przypinka do marynarki</p>

					</div>

				</div>

			</div>

		</div>

		<x-index.realizacje-hero :imgs="$realizacjeImgs" />

	</div>

	{{-- BLOG ITEMS --}}
	{{-- <div class="px-4">
		<x-index.blog-items :items="$blogItems" buttonText="{!! __('ui.browse_posts_btn') !!}" text="{!! __('blog.text') !!}" title="Blog" />
	</div> --}}

</x-ui.spacer>
