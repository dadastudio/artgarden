<?php

use App\Models\Post;
use Livewire\Volt\Component;

new class extends Component {
    public $terms = false;
    public $industry = false;
    public function with(): array
    {
        return [
            'blogItems' => Post::all(),
            // 'blogItems' => Post::factory()->count(11)->make(),
        ];
    }
    public function rendering(\Illuminate\View\View $view): void
    {
        // seo()->title('Capitalics Warsaw Type Foundry', template: false);
    }
}; ?>
<x-ui.spacer class="lg:-mt-42 -mt-34" pb type="md">

	<div class="relative">
		<div class="lg:aspect-100/55 aspect-9/10 bg-[url(/public/img/Hero-mobile.webp)] bg-cover bg-bottom bg-no-repeat lg:bg-[url(/public/img/blog_hero.jpg)] lg:bg-right">

		</div>

		<div class="bottom-5 left-10 max-lg:px-5 max-lg:py-5 lg:absolute">
			<x-ui.spacer>

				<div>
					<img src="/img/up_rect.svg" />
					<h1 class="text-pretty">Blog</h1>
				</div>

				<div class="prose prose-sm relative lg:max-w-[325px]">
					<p>Witamy na blogu naszego studia florystycznego ArtGarden!</p>

					<p>Jeśli kochasz kwiaty, interesujesz się florystyką lub szukasz inspiracji na aranżacje kwiatowe – jesteś we właściwym miejscu. Na naszym blogu znajdziesz relacje z najciekawszych realizacji, pomysły na bukiety ślubne, dekoracje na różne okazje, a także praktyczne porady od profesjonalnych florystów.</p>

					<p>Dodaj blog do ulubionych i bądź na bieżąco z najnowszymi trendami florystycznymi!.</p>
					<img class="absolute -bottom-6 right-0 rotate-180" src="/img/up_rect.svg" />
				</div>
				<p class="max-xl:hidden">&nbsp;</p>

				<flux:button class="mb-3" href="{{ route('index') }}" icon:trailing="arrow" inset variant="subtle">ODKRYJ WIĘCEJ</flux:button>

			</x-ui.spacer>

		</div>
	</div>

	<div class="grid md:grid-cols-4">

		@foreach ($blogItems as $item)
			<div class="-ml-px -mt-px border border-gray-300">
				<x-ui.spacer class="flex h-full flex-col p-5" type="xs">

					{{ $item->getFirstMedia()->img('main')->attributes(['class' => 'object-center aspect-4/3 object-cover']) }}
					<h2 class="line-clamp-2 flex-1 truncate text-pretty uppercase">{!! $item->title !!}</h2>

					<div class="prose line-clamp-4 flex-1 text-[10px]/[14px] uppercase text-gray-700">{!! $item->text !!}</div>
					<p>&nbsp;</p>

					<flux:button class="flex-none place-self-start" href="{{ route('blog.show', ['post' => $item->slug]) }}" icon:trailing="arrow" inset variant="ghost" wire:navigate>czytaj więcej</flux:button>
				</x-ui.spacer>
			</div>
		@endforeach

	</div>

	{{-- <flux:pagination :paginator="$blogItems" /> --}}

</x-ui.spacer>
