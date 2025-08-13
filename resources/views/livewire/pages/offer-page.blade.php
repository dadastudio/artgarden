<?php

use App\Models\Service;
use Livewire\Volt\Component;

new class extends Component {
    public $terms = false;
    public $industry = false;

    public Service $service;

    public function mount(Service $service): void
    {
        if (!$service->id) {
            $this->service = Service::first();
        }
    }

    public function with(): array
    {
        return [
            'currentRoute' => \Route::currentRouteName(),

            'services' => Service::all(),
        ];
    }
    public function rendering(\Illuminate\View\View $view): void
    {
        // seo()->title('Capitalics Warsaw Type Foundry', template: false);
    }
}; ?>

<div>
	<x-ui.spacer pt type="md">

		<div class="relative flex-row lg:flex">

			<div class="2xl:w-75/100 xl:w-70/100 lg:w-65/100 flex flex-row px-5 md:w-full lg:px-16 lg:py-10 xl:px-20">

				{{ $service->getFirstMedia()->img('main')->attributes(['class' => 'max-h-max w-full border border-gray-100 p-5']) }}

			</div>

			<x-index.hero-text text="{!! $service->intro !!}" title="{!! $service->title !!}" />

		</div>

		<div class="relative grid gap-8 bg-gray-100 p-5 md:p-10 xl:grid-cols-2">

			<x-ui.spacer class="flex flex-col">
				<div class="">
					<img src="/img/up_rect.svg" />

					<h1 class="text-pretty text-2xl">

						{{ $service->subtitle }}

					</h1>
				</div>
				<div class="grow">
					<div class="flex h-full flex-col gap-x-8 gap-y-6 md:flex-row">

						<div class="prose prose-sm basis-1/2">
							{!! $service->text_1 !!}

						</div>
						<div class="relative flex basis-1/2 flex-col justify-between">
							<div class="prose prose-sm relative">

								{!! $service->text_2 !!}

								<img class="absolute -bottom-6 right-0 rotate-180" src="/img/up_rect.svg" />
							</div>
							{{-- <div class="">
								<flux:button class="" href="{{ route('contact') }}" icon:trailing="arrow" variant="subtle">skontaktuj się z nami</flux:button>
							</div> --}}

						</div>
					</div>
				</div>
			</x-ui.spacer>

			<div class="grid border border-gray-200 max-sm:divide-y max-sm:divide-gray-300 md:grid-cols-2">

				@foreach ($services as $s)
					@if ($s->slug != $service->slug)
						<x-slot img="{{ $s->getFirstMedia()->getUrl('main') }}" route="{{ route('offer', $s->slug) }}" text="{!! $s->intro !!}" title="{!! $s->title !!}" />
					@endif
				@endforeach

			</div>

		</div>

	</x-ui.spacer>

	<x-index.realizacje-hero />
</div>
