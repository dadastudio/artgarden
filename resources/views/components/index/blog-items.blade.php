@props([
    'title' => '',
    'text' => '',
    'buttonText' => '',
    'buttonsText' => __('ui.read_more_btn'),
    'buttonLink' => 'blog',
    'items' => [],
])

<div class="grid grid-cols-1 gap-8 px-4 md:grid-cols-3 xl:grid-cols-4">

	<x-ui.spacer class="mb-5 md:place-self-end" type="xs">

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
					<div class="flex flex-none snap-start md:w-1/2 xl:w-1/3" id="{{ $loop->iteration }}">

						<div class="border border-gray-200">
							<x-ui.spacer class="flex h-full flex-col p-5" type="xs">

								{{ $item->getFirstMedia()->img('main')->attributes(['class' => 'object-center aspect-4/3 object-cover']) }}

								{{-- </div> --}}

								<h2 class="line-clamp-2 flex-1 truncate text-pretty uppercase">{!! $item->title !!}</h2>

								<div class="line-clamp-3 text-[10px]/[14px] uppercase text-gray-700">{!! $item->text !!}</div>
								<p>&nbsp;</p>

								<flux:button class="flex-none place-self-start" href="{{ route('post', ['post' => $item->slug]) }}" icon:trailing="arrow" inset variant="ghost" wire:navigate>{!! $buttonsText !!}</flux:button>
							</x-ui.spacer>
						</div>

					</div>
				@endforeach

			</div>

		</div>
		<div class="absolute inset-x-0 -bottom-12 hidden">

			<div class="text-center text-7xl">

				<a class="carousel-link text-gray-600" href="#1"> . </a>
				<a class="carousel-link text-green-600" href="#5"> . </a>

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
