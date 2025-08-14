<?php

use App\Models\Post;
use App\Models\Service;
use Livewire\Volt\Component;

new class extends Component {
    public $terms = false;
    public $industry = false;
    public function with(): array
    {
        return [
            'blogItems' => Post::all(),
            'services' => Service::all(),
            'workItems' => collect([(object) ['title' => 'Florystyka</br>ślubna', 'slug' => 'florystyka-slubna', 'text' => 'Planujesz ślub? Pozwól nam zadbać o&nbsp;kompleksową aranżację Twojej uroczystości: od bukietu dla panNy młodej, przez dekoracje florystyczne, po oprawę graficzną.', 'img' => '/img/oferta1.jpg'], (object) ['title' => 'Florystyka</br>okolicznościowa', 'slug' => 'florystyka-okolicznościowa', 'text' => 'Zbliża się koniec roku, chrzest lub komunia? Organizujesz imprezę firmową, wieczór panieński lub inne wydarzenie? przygotujemy Ci piękną aranżację kwiatową.', 'img' => '/img/oferta2.jpg'], (object) ['title' => 'Florystyka</br>dla firm', 'slug' => 'florystyka-dla-firm', 'text' => 'lChcesz udekorować przestrzeń swojej restauracji, recepcję w hotelu, biuro? Planujesz sesję zdjęciową? skontaktuj sie z nami, z&nbsp;przyjemnością się tym zajmiemy.', 'img' => '/img/oferta3.jpg']]),
        ];
    }
    public function rendering(\Illuminate\View\View $view): void
    {
        // seo()->title('Capitalics Warsaw Type Foundry', template: false);
    }
}; ?>

<x-ui.spacer class="lg:-mt-42 -mt-34" pb type="md">
	<div>

		<div class="relative">
			<div class="lg:aspect-100/55 aspect-9/10 bg-[url(/public/img/Hero-mobile.webp)] bg-cover bg-bottom bg-no-repeat lg:bg-[url(/public/img/Hero.jpg)] lg:bg-right">

			</div>

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

	<x-oferta.hero id="oferta-hero" img="oferta.jpg" text="{{ __('texts.offer') }}" title="{{ __('ui.offer') }}" />

	{{-- <x-index.blog-items :items="$workItems" buttonLink="contact" buttonText="skontaktuj się <span class='hidden lg:inline'>z nami</span>" buttonsText="dowiedz się więcej" text="<p>Działamy głównie w Warszawie i okolicy (do 50 km). Ale jesteśmy też otwarci na propozycje z&nbsp;innych zakątków Polski.</p><p>Realizujemy dostawy na terenie całej Warszawy, lub umożliwiamy odbiór zamówień z&nbsp;naszej pracowni florystycznej.</p>" /> --}}

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

		<x-index.realizacje-hero />

	</div>

	{{-- BLOG ITEMS --}}
	<div class="px-4">
		<x-index.blog-items :items="$blogItems" buttonText="{!! __('ui.browse_posts_btn') !!}" text="{{ __('texts.blog') }}" title="Blog" />
	</div>

</x-ui.spacer>
