@props([
    'imgs' => [],
])
<div class="bg-green-950 text-white">

	{{-- <div class="relative flex flex-col gap-y-8 xl:flex-row xl:gap-24 xl:px-20"> --}}
	<div class="relative flex-row lg:flex">

		<div class="2xl:w-75/100 xl:w-70/100 lg:w-63/100 flex flex-row items-end gap-2 px-16 py-10 max-lg:hidden xl:px-20">
			{{-- <img class="w-2/3 border border-green-900 p-2" src="/img/realizacje1.jpg"> --}}
			{{ $imgs[0]->getFirstMedia()->img('main')->attributes(['class' => 'w-2/3 border border-green-900 p-2']) }}
			<div class="flex w-1/3 flex-col gap-2">

				{{ $imgs[1]->getFirstMedia()->img('main')->attributes(['class' => 'w-full border border-green-900 p-2']) }}
				{{ $imgs[2]->getFirstMedia()->img('main')->attributes(['class' => 'w-full border border-green-900 p-2']) }}

				{{-- <img class="w-full border border-green-900 p-2" src="/img/realizacje3.jpg"> --}}
			</div>
		</div>

		<div class="flex flex-col gap-y-2 px-5 pt-5 lg:hidden">

			<div class="grid grid-cols-2 gap-2">
				<div class="border border-green-900 p-2">
					<div class="">
						{{-- <img class="w-full object-cover object-center" src="/img/realizacje1.jpg"> --}}

						{{ $imgs[0]->getFirstMedia('mobile')->img('hero_mobile')->attributes(['class' => 'w-full ']) }}

					</div>
				</div>

				<div class="border border-green-900 p-2">
					<div class="">
						{{-- <img class="w-full object-cover object-center" src="/img/realizacje2.jpg"> --}}
						{{ $imgs[1]->getFirstMedia('mobile')->img('hero_mobile')->attributes(['class' => 'w-full ']) }}

					</div>
				</div>
			</div>

			{{ $imgs[2]->getFirstMedia('mobile')->img('hero_mobile')->attributes(['class' => 'w-full border border-green-900 p-2']) }}

			{{-- <img class="w-full border border-green-900 p-2" src="/img/realizacje3.jpg"> --}}
		</div>

		<x-index.hero-text buttonText="{!! __('ui.see_more_btn') !!}" invert link="{{ route('works') }}" text="{!! __('texts.works') !!}" title="{{ __('ui.work') }}" />

	</div>
</div>
