<?php

use App\Models\Service;
use Livewire\Volt\Component;
use App\Actions\SEOManager;
use App\Models\Photo;

new class extends Component {
    public Service $service;

    public function mount(Service $service): void
    {
        if (!$service->id) {
            $this->service = Service::first();
        }

        SEOManager::title($this->service->title);
        SEOManager::description($this->service->intro);
    }

    public function with(): array
    {
        return [
            'services' => Service::whereNot('id', $this->service->id)->get(),
            'realizacjeImgs' => [Photo::find(105), Photo::find(106), Photo::find(107)],
        ];
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

					<h1 class="text-pretty text-xl lg:text-2xl">

						{{ $service->subtitle }}

					</h1>
				</div>
				<div class="grow">
					<div class="flex h-full flex-col gap-x-8 gap-y-4 md:flex-row">

						<div class="prose prose-sm basis-1/2">
							{!! $service->text_1 !!}

						</div>
						<div class="relative flex basis-1/2 flex-col justify-between">
							<div class="prose prose-sm relative">

								{!! $service->text_2 !!}

								<img class="absolute -bottom-6 right-0 rotate-180" src="/img/up_rect.svg" />
							</div>

						</div>
					</div>
				</div>
			</x-ui.spacer>

			<div class="grid border border-gray-200 md:grid-cols-2">

				@foreach ($services as $s)
					<x-slot img="{{ $s->getFirstMedia()->getUrl('main') }}" route="{{ route('offer', $s->slug) }}" text="{!! $s->intro !!}" title="{!! $s->title !!}" />
				@endforeach

			</div>

		</div>

	</x-ui.spacer>

	{{-- <x-index.realizacje-hero /> --}}
	<x-index.realizacje-hero :imgs="$realizacjeImgs" />

</div>
