<?php

use App\Models\Work;
use Livewire\Volt\Component;

new class extends Component {
    public $terms = false;
    public $industry = false;
    public function with(): array
    {
        return [
            'workItems' => Work::ordered()->get(),
        ];
    }
    public function rendering(\Illuminate\View\View $view): void
    {
        // seo()->title('Capitalics Warsaw Type Foundry', template: false);
    }
}; ?>
<div>
	<x-ui.spacer py type="md">

		<div class="relative flex-row lg:flex">
			<div class="2xl:w-75/100 xl:w-70/100 lg:w-65/100 flex flex-row px-5 md:w-full lg:px-16 lg:py-10 xl:px-20">
				<img class="max-h-max w-full border border-gray-100 p-5" src="/img/oferta.jpg">

			</div>

			<x-index.hero-text buttonText="{{ __('ui.contact_us_btn') }}" link="{{ route('contact') }}" text="{!! __('texts.works') !!}" title="{{ __('ui.work') }}">

				<div class="flex flex-row items-center gap-x-5">

					<img class="max-w-max" src="/img/download.svg" />
					<p class="max-w-[220px] text-[10px]/snug uppercase">{{ __('ui.catalog_info') }}
					</p>
				</div>
			</x-index.hero-text>
		</div>

		<x-works.masonry :workItems="$workItems" />

	</x-ui.spacer>

</div>
