@props([
    'title' => '',
    'text' => '',
    'buttonText' => '',
    'buttonsText' => __('ui.read_more_btn'),
    'buttonLink' => 'blog',
    'items' => [],
])

<div class="{{ $title || $text ? 'md:grid-cols-3 xl:grid-cols-4' : '' }} grid grid-cols-1 gap-8 px-0">

	@if ($title || $text)
		<x-ui.spacer class="mb-4.5 md:place-self-end" type="xs">

			<div>
				<img alt="" src="/img/up_rect.svg" />
				@if ($title)
					<h2>{{ $title }}</h2>
				@endif
			</div>
			<div class="prose prose-sm relative">

				{!! $text !!}
				<img alt="" class="absolute -bottom-6 right-0 rotate-180" src="/img/up_rect.svg" />

			</div>
			<p>&nbsp;</p>

			<flux:button href="{{ route($buttonLink) }}" icon:trailing="arrow" inset variant="ghost">{!! $buttonText !!}</flux:button>

		</x-ui.spacer>
	@endif

	<div class="{{ $title || $text ? 'md:col-span-2 xl:col-span-3' : '' }} relative col-span-1">

		<div class="relative flex flex-wrap items-center justify-center overflow-x-hidden border border-gray-100">

			<div class="scrollbar-hide inline-flex snap-x snap-mandatory overflow-x-scroll scroll-smooth" id="blogItemsScroll">

				@foreach ($items as $item)
					<div class="flex w-full flex-none snap-start md:w-1/2 xl:w-1/3" id="{{ $loop->iteration }}">

						<x-slot buttonText="{!! __('ui.read_more_btn') !!}" img="{{ $item->getFirstMedia()->getUrl('main') }}" route="{{ route('post', $item->slug) }}" text="{!! $item->text !!}" title="{!! $item->title !!}" />

					</div>
				@endforeach

			</div>

		</div>
		<div class="-bottom-10.5 absolute inset-x-0 md:-bottom-12 xl:-bottom-12">

			<div class="flex flex-row items-center justify-center gap-3.5">

				<flux:button icon="arrow-left" id="scrollLeft" inline variant="ghost" />
				<flux:icon.gallery-horizontal class="text-gray-400" />
				<flux:button icon="arrow-right" id="scrollRight" inline variant="ghost" />

			</div>

		</div> {{-- dots end --}}

	</div>

</div>
@script
	<script>
		const scrollContainer = document.getElementById('blogItemsScroll');
		const scrollLeftBtn = document.getElementById('scrollLeft');
		const scrollRightBtn = document.getElementById('scrollRight');

		// Calculate scroll amount based on container width
		function getScrollAmount() {
			const containerWidth = scrollContainer.offsetWidth;
			// Scroll by one item width (container width divided by visible items)
			return containerWidth / 3; // Adjust based on how many items are visible
		}

		// Scroll left functionality
		scrollLeftBtn.addEventListener('click', () => {
			const scrollAmount = getScrollAmount();
			scrollContainer.scrollBy({
				left: -scrollAmount,
				behavior: 'smooth'
			});
		});

		// Scroll right functionality
		scrollRightBtn.addEventListener('click', () => {
			const scrollAmount = getScrollAmount();
			scrollContainer.scrollBy({
				left: scrollAmount,
				behavior: 'smooth'
			});
		});

		// Existing carousel link functionality (if needed)
		let activeLink = document.querySelectorAll('.carousel-link')[0];

		document.querySelectorAll('.carousel-link').forEach(link => {
			link.addEventListener('click', event => {
				event.preventDefault();

				if (activeLink) {
					activeLink.classList.remove('text-gray-600');
					activeLink.classList.add('text-green-600');
				}
				activeLink = link;

				activeLink.classList.add('text-gray-600');
				activeLink.classList.remove('text-green-600');

				const target = document.getElementById(link.getAttribute('href').split('#')[1]);
				if (target) {
					target.scrollIntoView({
						behavior: 'smooth',
						inline: 'center',
						block: 'nearest',
					});
				}
			});
		});
	</script>
@endscript
