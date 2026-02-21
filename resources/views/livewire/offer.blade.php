<?php

use Livewire\Volt\Component;
use App\Models\Service;
use App\Models\Photo;

new class extends Component {
    //

    public function with(): array
    {
        return [
            'services' => Service::ordered()->get(),
            'ofertaImg' => Photo::find(102),
        ];
    }
}; ?>

<div>
	<x-hero :heroImg="$ofertaImg" :imgFull="false" :is_left="true" id="oferta-hero" text="{!! __('texts.offer') !!} {!! __('offer.main_text') !!}" title="{{ __('ui.offer') }}" />
	{{-- <x-hero :heroImg="$ofertaImg" :imgFull="false" :is_left="true" id="oferta-hero" text="{{ __('texts.offer') }}" title="{{ __('ui.offer') }}" /> --}}

	<div class="relative px-4">
		{{-- <div class="relative grid gap-8 bg-gray-100 p-5 md:p-10 xl:grid-cols-4"> --}}

		{{-- <x-ui.spacer class="mb-4.5 hidden md:place-self-end" type="xs">

			<div class="">
				<img alt="" src="/img/up_rect.svg" />

			</div>
			<div class="prose prose-sm relative">

				{!! __('offer.main_text') !!}

				<img alt="" class="absolute -bottom-6 right-0 rotate-180" src="/img/up_rect.svg" />

			</div>

			<p>&nbsp;</p>

			<flux:button href="{{ route('contact') }}" icon:trailing="arrow" inset variant="ghost">{!! __('ui.contact_us_btn') !!}</flux:button>

		</x-ui.spacer> --}}

		<div class="col-span-3 grid border border-gray-200 md:grid-cols-3">

			@foreach ($services as $s)
				<x-slot img="{{ $s->getFirstMedia()->getUrl('main') }}" route="{{ route('offers', $s->slug) }}" text="{!! $s->intro !!}" title="{!! Str::replaceFirst(' ', '</br>', $s->title) !!}" />
			@endforeach

		</div>

	</div>
</div>
