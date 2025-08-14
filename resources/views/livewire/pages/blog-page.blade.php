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
		<div class="lg:aspect-86/55 aspect-9/10 bg-[url(/public/img/Hero-mobile.webp)] bg-cover bg-bottom bg-no-repeat lg:bg-[url(/public/img/blog_hero.jpg)] lg:bg-right">

		</div>

		<div class="bottom-5 left-10 max-lg:px-5 max-lg:py-5 lg:absolute">
			<x-ui.spacer>

				<div>
					<img src="/img/up_rect.svg" />
					<h1 class="text-pretty">Blog</h1>
				</div>

				<div class="prose prose-sm relative lg:max-w-[325px]">
					@lang('texts.blog_page')
					<img class="absolute -bottom-6 right-0 rotate-180" src="/img/up_rect.svg" />
				</div>
				<p class="max-xl:hidden">&nbsp;</p>

				<flux:button class="mb-3" href="#" icon:trailing="arrow" inset variant="subtle">@lang('ui.more_btn')</flux:button>

			</x-ui.spacer>

		</div>
	</div>

	<div class="grid max-sm:px-5 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">

		@foreach ($blogItems as $item)
			{{-- <div class="-ml-px -mt-px"> --}}

			<x-slot buttonText="{!! __('ui.read_more_btn') !!}" class="-ml-px -mt-px" img="{{ $item->getFirstMedia()->getUrl('main') }}" route="{{ route('post', $item->slug) }}" text="{!! $item->text !!}" title="{!! $item->title !!}" />

			{{-- <x-ui.spacer class="flex h-full flex-col p-5" type="xs">

					{{ $item->getFirstMedia()->img('main')->attributes(['class' => 'object-center aspect-4/3 object-cover']) }}
					<h2 class="line-clamp-2 flex-1 truncate text-pretty uppercase">{!! $item->title !!}</h2>

					<div class="line-clamp-4 flex-1 text-[10px]/[14px] uppercase text-gray-700">{!! $item->text !!}</div>
					<p>&nbsp;</p>

					<flux:button class="flex-none place-self-start" href="{{ route('post', ['post' => $item->slug]) }}" icon:trailing="arrow" inset variant="ghost" wire:navigate>@lang('ui.read_more_btn')</flux:button>
				</x-ui.spacer> --}}

			{{-- </div> --}}
		@endforeach

	</div>

	{{-- <flux:pagination :paginator="$blogItems" /> --}}

</x-ui.spacer>
