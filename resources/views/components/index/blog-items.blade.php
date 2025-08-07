@props([
    'title' => '',
    'text' => '',
    'buttonText' => '',
    'buttonLink' => 'index',
    'items' => [],
])

<div class="grid grid-cols-1 gap-8 px-4 md:grid-cols-3 xl:grid-cols-4">

	<x-ui.spacer class="md:place-self-end" type="xs">

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
		<div class="relative flex flex-wrap items-center justify-center gap-2 overflow-x-hidden border border-gray-300">

			<div class="carousel carousel-start">

				@foreach ($items as $item)
					<div class="carousel-item w-full md:w-1/2 xl:w-1/3" id="{{ $loop->iteration }}">
						<x-slot img="{{ $item->img }}" text="{{ $item->text }}" title="{{ $item->title }}" />
					</div>
				@endforeach

				{{-- <div class="carousel-item w-full md:w-1/2 xl:w-1/3" id="2">
					<x-slot class="" img="blog2.jpg" text="Zbliża się koniec roku, chrzest lub komunia? Organizujesz imprezę firmową, wieczór panieński lub inne wydarzenie? przygotujemy Ci piękną aranżację kwiatową." title="dwór konstancin - ślub w&nbsp;plenerze" />
				</div>

				<div class="carousel-item w-full md:w-1/2 xl:w-1/3" id="3">
					<x-slot class="" img="blog3.jpg" text="Chcesz udekorować przestrzeń swojej restauracji, recepcję w hotelu, biuro? Planujesz sesję zdjęciową? skontaktuj sie z nami, z&nbsp;przyjemnością się tym zajmiemy." title="hotel borowina *** - przyjęcie pod Warszawą" />
				</div>

				<div class="carousel-item w-full md:w-1/2 xl:w-1/3" id="4">
					<x-slot img="blog1.jpg" text="Planujesz ślub? Pozwól nam zadbać o&nbsp;kompleksową aranżację Twojej uroczystości: od bukietu dla panNy młodej, przez dekoracje florystyczne, po oprawę graficzną." title="Bukiety warzywne i&nbsp;owocowe " />
				</div> --}}

				{{-- <div class="carousel-item w-full md:w-1/2 xl:w-1/3" id="5">
					<x-slot class="" img="blog2.jpg" text="Zbliża się koniec roku, chrzest lub komunia? Organizujesz imprezę firmową, wieczór panieński lub inne wydarzenie? przygotujemy Ci piękną aranżację kwiatową." title="dwór konstancin - ślub w&nbsp;plenerze" />
				</div>

				<div class="carousel-item w-full md:w-1/2 xl:w-1/3" id="6">
					<x-slot class="" img="blog3.jpg" text="Chcesz udekorować przestrzeń swojej restauracji, recepcję w hotelu, biuro? Planujesz sesję zdjęciową? skontaktuj sie z nami, z&nbsp;przyjemnością się tym zajmiemy." title="hotel borowina *** - przyjęcie pod Warszawą" />
				</div> --}}

			</div>

		</div>
		<div class="absolute inset-x-0 -bottom-12">

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
