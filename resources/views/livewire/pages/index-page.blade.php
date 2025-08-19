<?php

use App\Models\Post;
use App\Models\Service;
use App\Models\Photo;
use Livewire\Volt\Component;

new class extends Component {
    public function with(): array
    {
        return [
            'blogItems' => Post::all(),
            'services' => Service::all(),

            'heroImg' => Photo::find(101),
            'ofertaImg' => Photo::find(102),
            'realizacjeImgs' => [Photo::find(105), Photo::find(106), Photo::find(107)],
        ];
    }
}; ?>

<x-ui.spacer class="lg:-mt-42 -mt-34" pb type="md">
	<div>

		<x-hero :$heroImg buttonText="{!! __('ui.more_btn') !!}" href="#oferta-hero" text="{{ __('texts.about') }}" title="{{ __('texts.about_header') }}" />

		<div class="relative hidden">

			{{ $heroImg->getFirstMedia()->img('hero')->attributes(['class' => 'hidden sm:block']) }}

			{{ $heroImg->getFirstMedia('mobile')->img('hero_mobile')->attributes(['class' => 'sm:hidden']) }}

			<div class="bottom-5 left-10 max-lg:px-5 max-lg:py-5 lg:absolute">
				<x-ui.spacer>

					<div>
						<img src="/img/up_rect.svg" />
						<h1 class="text-pretty">@lang('texts.about_header')</h1>
					</div>

					<div class="prose prose-sm relative lg:max-w-[325px]">
						<p>@lang('texts.about')</p>
						<img class="absolute -bottom-6 right-0 rotate-180" src="/img/up_rect.svg" />
					</div>
					<p class="max-xl:hidden">&nbsp;</p>

					<flux:button class="mb-3" href="#oferta-hero" icon:trailing="arrow" inset variant="subtle">@lang('ui.more_btn')</flux:button>

				</x-ui.spacer>

			</div>
		</div>

		<x-index.baner quoteAuthor="{{ __('quotes.q_1_a') }}" quote="{{ __('quotes.q_1') }}" />
	</div>

	<x-hero :heroImg="$ofertaImg" :imgFull="false" :is_left="false" id="oferta-hero" text="{{ __('texts.offer') }}" title="{{ __('ui.offer') }}" />

	<div class="relative grid gap-8 bg-gray-100 p-5 md:p-10 xl:grid-cols-4">

		<x-ui.spacer class="mb-4.5 md:place-self-end" type="xs">

			<div class="">
				<img src="/img/up_rect.svg" />

			</div>
			<div class="prose prose-sm relative">

				<p>Działamy głównie w Warszawie i okolicy (do 50 km). Ale jesteśmy też otwarci na propozycje z&nbsp;innych zakątków Polski.</p>
				<p>Realizujemy dostawy na terenie całej Warszawy, lub umożliwiamy odbiór zamówień z&nbsp;naszej pracowni florystycznej.</p>
				<img class="absolute -bottom-6 right-0 rotate-180" src="/img/up_rect.svg" />

			</div>

			<p>&nbsp;</p>

			<flux:button href="{{ route('offer') }}" icon:trailing="arrow" inset variant="ghost">{!! __('ui.contact_us_btn') !!}</flux:button>

		</x-ui.spacer>

		<div class="col-span-3 grid border border-gray-200 md:grid-cols-3">

			@foreach ($services as $s)
				<x-slot img="{{ $s->getFirstMedia()->getUrl('main') }}" route="{{ route('offer', $s->slug) }}" text="{!! $s->intro !!}" title="{!! Str::replaceFirst(' ', '</br>', $s->title) !!}" />
			@endforeach

		</div>

	</div>

	<div>
		<x-index.baner quoteAuthor="{{ __('quotes.q_2_a') }}" quote="{{ __('quotes.q_2') }}" />

		{{-- WIANEK I KORSARZ --}}

		<div class="aspect-5/3 relative bg-[url(/public/img/sala.jpg)] bg-cover bg-center bg-no-repeat">

			<div class="xl:px-30 grid grid-cols-2 gap-2 px-5 py-5 sm:px-10 md:px-20 md:py-10 lg:px-24">
				<div class="col-start-1s col-end-3s">
					<div class="max-w-[320px] bg-white p-2 shadow-xl md:p-5">
						<img class="" src="/img/wianek.jpg">
						<p class="mt-2.5 text-[10px] uppercase text-gray-600">wianek i korsarz na rękę</p>

					</div>
				</div>
				<div>&nbsp;</div>
				<div>&nbsp;</div>
				<div class="place-self-end">

					<div class="max-w-[300px] bg-white p-2 shadow-xl md:p-5">
						<img class="" src="/img/przypinka.jpg">
						<p class="mt-2.5 text-[10px] uppercase text-gray-600">przypinka do marynarki</p>

					</div>

				</div>

			</div>

		</div>

		<x-index.realizacje-hero :imgs="$realizacjeImgs" />

	</div>

	{{-- BLOG ITEMS --}}
	<div class="px-4">
		<x-index.blog-items :items="$blogItems" buttonText="{!! __('ui.browse_posts_btn') !!}" text="{{ __('texts.blog') }}" title="Blog" />
	</div>

</x-ui.spacer>
