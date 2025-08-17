<?php

use App\Models\Post;
use Livewire\Volt\Component;
use App\Actions\SEOManager;

new class extends Component {
    public function mount(): void
    {
        SEOManager::title(__('ui.blog'));
        SEOManager::description(__('blog.meta_description'));
    }

    public function with(): array
    {
        return [
            'blogItems' => Post::all(),
        ];
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
					<h1 class="text-pretty">@lang('ui.blog')</h1>
				</div>

				<div class="prose prose-sm relative lg:max-w-[325px]">
					@lang('blog.text')
					<img class="absolute -bottom-6 right-0 rotate-180" src="/img/up_rect.svg" />
				</div>
				<p class="max-xl:hidden">&nbsp;</p>

				<flux:button class="mb-3" href="#" icon:trailing="arrow" inset variant="subtle">@lang('ui.more_btn')</flux:button>

			</x-ui.spacer>

		</div>
	</div>

	<div class="grid max-sm:px-5 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">

		@foreach ($blogItems as $item)
			<x-slot buttonText="{!! __('ui.read_more_btn') !!}" class="-ml-px -mt-px" img="{{ $item->getFirstMedia()->getUrl('main') }}" route="{{ route('post', $item->slug) }}" text="{!! $item->text !!}" title="{!! $item->title !!}" />
		@endforeach

	</div>

</x-ui.spacer>
