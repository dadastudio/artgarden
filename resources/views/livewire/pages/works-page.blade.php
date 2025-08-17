<?php

use App\Models\Work;
use App\Models\Photo;
use Livewire\Volt\Component;
use App\Actions\SEOManager;

new class extends Component {
    public function mount(): void
    {
        SEOManager::title(__('ui.work'));
        SEOManager::description(__('work.meta_description'));
    }

    public function with(): array
    {
        return [
            'workItems' => Work::ordered()->get(),
            'photo' => Photo::find(13),
        ];
    }
}; ?>
<div>
	<x-ui.spacer py type="md">

		<div class="relative flex-row lg:flex">
			<div class="2xl:w-75/100 xl:w-70/100 lg:w-65/100 flex flex-row px-5 md:w-full lg:px-16 lg:py-10 xl:px-20">

				{{ $photo->getFirstMedia()->img('main')->attributes(['class' => 'max-h-max w-full border border-gray-100 p-5']) }}

			</div>

			<x-index.hero-text buttonText="{{ __('ui.contact_us_btn') }}" link="{{ route('contact') }}" text="{!! __('work.text') !!}" title="{{ __('ui.work') }}">
				<a class="text-gray-700 no-underline transition-colors hover:text-green-700" href="{{ route('download') }}">
					<div class="flex flex-row items-center gap-x-5">
						<img class="max-w-max" src="/img/download.svg" />
						<p class="max-w-[220px] text-[10px]/snug uppercase">{{ __('work.catalog_download') }}
						</p>
					</div>

				</a>
			</x-index.hero-text>
		</div>

		<x-works.masonry :workItems="$workItems" />

	</x-ui.spacer>

</div>
