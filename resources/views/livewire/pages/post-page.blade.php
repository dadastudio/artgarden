<?php

use App\Models\Post;
use Livewire\Volt\Component;

new class extends Component {
    public $terms = false;
    public $industry = false;
    public function with(): array
    {
        return [
            'blogItem' => Post::factory()->make(),
            'blogItems' => Post::factory()->count(6)->make(),

            'workItems' => Post::factory()->count(13)->make(),
        ];
    }
    public function rendering(\Illuminate\View\View $view): void
    {
        // seo()->title('Capitalics Warsaw Type Foundry', template: false);
    }
}; ?>
<div>

	<x-ui.spacer pb pt type="md">

		<div class="relative flex-row lg:flex">
			<div class="2xl:w-75/100 xl:w-70/100 lg:w-65/100 flex flex-row px-5 md:w-full lg:px-16 lg:py-10 xl:px-20">

				<img class="max-h-max w-full border border-gray-100 p-5" src="/img/oferta.jpg">
				<x-index.hero-text text="<p>Mamy w ofercie niezwykle oryginalne, nadające się na prezenty i zawsze wzbudzające ogromne emocje bukiety warzywne i owocowe.

Fantastycznie sprawdzają się także jako ozdoba recepcji hotelowej, czy restauracji.

Ostatnio mieliśmy przyjemność pokazać nasze piękne kompozycje w So-An Sushi Club - ku uciesze gości i załogi, którzy mogli na bieżąco się nimi delektować.

</p>" title="{{ $blogItem->title }}" />

			</div>

		</div>
		<x-works.masonry :workItems="$workItems" />
		{{-- <div class="grid gap-5 md:grid-cols-2 xl:grid-cols-12">
			@php
				$spanPatterns = [
				    [4, 3, 5], // Row 1: 4-3-5
				    [3, 5, 4], // Row 2: 3-5-4
				    [3, 4, 5], // Row 3: 3-4-5
				];

				$ratioPatterns = [
				    ['3/4', '1/1', '4/3'], // Row 1: 3/4, 1/1, 4/3
				    ['4/3', '3/4', '1/1'], // Row 2: 4/3, 3/4, 1/1
				    ['3/4', '4/3', '1/1'], // Row 3: 3/4, 4/3, 1/1
				];
			@endphp
			@foreach ($workItems as $index => $workItem)
				@php
					$row = intdiv($index, 3) % 3; // which pattern row (0..2)
					$col = $index % 3; // position in the row (0..2)
					$span = $spanPatterns[$row][$col];
					$ratio = $ratioPatterns[$row][$col];

					// Tailwind aspect helpers
					$aspectClass = $ratio === '1/1' ? 'aspect-square' : "aspect-$ratio";
				@endphp

				<div class="xl:col-span-{{ $span }}">

					<div class="border border-gray-100 p-5">

						<div class="{{ $aspectClass }} overflow-hidden">
							<img class="h-full w-full object-cover object-center" src="https://picsum.photos/600/780?random={{ $loop->index }}">
						</div>

						<div class="row flex items-center justify-between pt-5 uppercase text-gray-800">
							<h3 class="pr-5">{{ str_pad($loop->index + 1, 2, '0', STR_PAD_LEFT) }}.</h3>
							<h3 class="text-pretty text-right">{{ $workItem->title }}</h3>
						</div>
					</div>

				</div>
			@endforeach

		</div> --}}
		<x-index.blog-items :items="$blogItems" buttonText="<span class='hidden lg:inline'>przeglądaj</span> artykuły" text="<p>Zapraszamy do zapoznania się z pozostałymi wpisami na naszym blogu.</p>" title="Blog" />

	</x-ui.spacer>
</div>
