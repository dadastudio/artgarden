<?php

use Livewire\Volt\Component;
use App\Actions\SEOManager;

new class extends Component {
    public function mount(): void
    {
        SEOManager::title(__('terms.title'));
        SEOManager::description(__('terms.meta_description'));
    }
}; ?>
<x-ui.spacer class="lg:-mt-42 -mt-34" pb type="md">

	<div class="relative">
		<div class="lg:aspect-100/55 aspect-9/10 bg-[url(/public/img/Hero-mobile.webp)] bg-cover bg-bottom bg-no-repeat lg:bg-[url(/public/img/faq.jpg)] lg:bg-right">

		</div>

		<div class="bottom-5 left-10 max-lg:px-5 max-lg:py-5 lg:absolute">
			<x-ui.spacer>

				<div>
					<img src="/img/up_rect.svg" />
					<h1 class="text-pretty">@lang('terms.title')</h1>
				</div>

				<div class="prose prose-sm relative lg:max-w-[325px]">
					@lang('terms.intro')
					<img class="absolute -bottom-6 right-0 rotate-180" src="/img/up_rect.svg" />
				</div>

			</x-ui.spacer>

		</div>
	</div>

	<div class="prose prose-sm mx-auto">

		@lang('terms.text')

	</div>
</x-ui.spacer>
