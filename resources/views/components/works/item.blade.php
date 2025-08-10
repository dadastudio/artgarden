@props([
    'workItem' => null,
    'loop' => null,
])
<div class="mt-5 h-full w-full border border-gray-100 object-cover p-5">

	<img class="w-full" src="{{ $workItem->img }}">

	<div class="row flex flex items-center justify-between pt-5 uppercase text-gray-800">
		<h3 class="pr-5">{{ $loop->index + 1 }}.</h3>
		<h3 class="text-pretty text-right">{{ $workItem->img }}</h3>
	</div>
</div>
