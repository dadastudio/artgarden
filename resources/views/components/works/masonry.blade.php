@props([
    'workItems' => [],
    'showButton' => true,
])
<div class="grid gap-5 px-2.5 md:grid-cols-12 xl:gap-y-20">

	<div class="hidden">
		<div class="md:col-span-5"> </div>
		<div class="md:col-span-6"> </div>
		<div class="md:col-span-7"> </div>

		<div class="xl:col-span-4"> </div>
		<div class="xl:col-span-3"> </div>
		<div class="xl:col-span-5"> </div>

	</div>
	@php
		$spanPatterns = [
		    [4, 3, 5], // 1
		    [3, 5, 4], // 2
		    [3, 4, 5], // 3
		    [5, 4, 3], // 4

		    [4, 3, 5], // 5
		    [3, 5, 4], //  6
		    [4, 3, 5], //  7
		    [4, 5, 3], //  8

		    [5, 4, 3], //  9
		    [3, 4, 5], //  10
		    [5, 3, 4], //  11
		    [3, 4, 5], //  12

		    [5, 3, 4], //  13
		    [4, 3, 5], //  14
		    [3, 5, 4], //  15
		];

		$spanPatternsMd = [
		    [5, 7], // 1
		    [7, 5], // 2
		    [6, 6], // 3
		];

		// $ratioPatterns = [
		//     ['3/4', '1/1', '4/3'], // Row 1: 3/4, 1/1, 4/3
		//     ['4/3', '3/4', '1/1'], // Row 2: 4/3, 3/4, 1/1
		//     ['3/4', '4/3', '1/1'], // Row 3: 3/4, 4/3, 1/1
		// ];

	@endphp

	@foreach ($workItems as $index => $workItem)
		@php
			$row = intdiv($index, 3) % count($spanPatterns);
			$col = $index % 3; // position in the row (0..2)
			$span = $spanPatterns[$row][$col];

			$rowMd = intdiv($index, 2) % count($spanPatternsMd);
			$colMd = $index % 2; // position in the row (0..2)
			$spanMd = $spanPatternsMd[$rowMd][$colMd];

		@endphp

		<div class="md:col-span-{{ $spanMd }} xl:col-span-{{ $span }}">
			<div class="border border-gray-100 p-5">

				<div class="overflow-hiddens">

					{{-- {{ $workItem->getFirstMedia()->img('main')->attributes(['class' => '']) }} --}}
					{{-- @dd($workItem->getFirstMedia()->getUrl('main')) --}}

					{{-- {{ $workItem->getFirstMedia() }} --}}
					{{-- {{ $workItem->getFirstMedia()->img('main')->attributes(['class' => 'h-full w-full ']) }} --}}

					<img src="{{ $workItem->getFirstMediaUrl() }}" />
				</div>

				<div class="row flex items-center justify-between pt-5 uppercase text-gray-800">
					<h3 class="pr-5"> {{ str_pad($loop->index + 1, 2, '0', STR_PAD_LEFT) }}.</h3>
					<h3 class="text-pretty text-right">{{ $workItem->title }}</h3>
				</div>
			</div>
			@if ($showButton && $workItem->post)
				<div class="p-4">
					<flux:button href="{{ route('post', ['post' => $workItem->post->slug]) }}" icon:trailing="arrow" inset variant="ghost" wire:navigate>
						obejrzyj więcej
					</flux:button>
				</div>
			@endif

		</div>
	@endforeach

</div>
