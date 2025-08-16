@props([
    'title' => '',
    'text' => '',
    'buttonText' => '',
    'buttonsText' => __('ui.read_more_btn'),
    'buttonLink' => 'blog',
    'items' => [],
])

<div class="grid grid-cols-1 gap-8 px-0 md:grid-cols-3 xl:grid-cols-4">

	<x-ui.spacer class="mb-4.5 md:place-self-end" type="xs">

		<div>
			<img src="/img/up_rect.svg" />
			@if ($title)
				<h1>{{ $title }}</h1>
			@endif
		</div>
		<div class="prose prose-sm relative">

			{!! $text !!}
			<img class="absolute -bottom-6 right-0 rotate-180" src="/img/up_rect.svg" />

		</div>
		<p>&nbsp;</p>

		<flux:button href="{{ route($buttonLink) }}" icon:trailing="arrow" inset variant="ghost">{!! $buttonText !!}</flux:button>

	</x-ui.spacer>

	<div class="relative col-span-1 md:col-span-2 xl:col-span-3">

		<div class="relative flex flex-wrap items-center justify-center overflow-x-hidden border border-gray-100">

			<div class="scrollbar-hide inline-flex snap-x snap-mandatory overflow-x-scroll scroll-smooth">

				@foreach ($items as $item)
					<div class="flex w-full flex-none snap-start md:w-1/2 xl:w-1/3" id="{{ $loop->iteration }}">

						<x-slot buttonText="{!! __('ui.read_more_btn') !!}" img="{{ $item->getFirstMedia()->getUrl('main') }}" route="{{ route('post', $item->slug) }}" text="{!! $item->text !!}" title="{!! $item->title !!}" />

					</div>
				@endforeach

			</div>

		</div>
		<div class="-bottom-10.5 absolute inset-x-0 md:-bottom-12 xl:-bottom-12">

			<div class="flex flex-row items-center justify-center gap-3.5">

				<flux:button icon="arrow-left" inline variant="ghost" />
				<flux:icon.gallery-horizontal class="text-gray-400" />
				<flux:button icon="arrow-right" inline variant="ghost" />

			</div>

		</div> {{-- dots end --}}

	</div>

</div>
@script
	<script>
		let activeLink = document.querySelectorAll('.carousel-link')[0];
		// activeLink.classList.add('text-gray-600');

		document.querySelectorAll('.carousel-link').forEach(link => {


			link.addEventListener('click', event => {
				event.preventDefault();

				activeLink.classList.remove('text-gray-600');
				activeLink.classList.add('text-green-600');
				activeLink = link;


				activeLink.classList.add('text-gray-600');
				activeLink.classList.remove('text-green-600');

				target = document.getElementById(link.getAttribute('href').split('#')[1]);
				target.scrollIntoView({
					behavior: 'smooth',
					inline: 'center',
					block: 'nearest',
				});

			});
		});
	</script>
@endscript
