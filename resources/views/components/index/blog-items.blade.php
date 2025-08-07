@props([
    'title' => '',
    'text' => '',
    'buttonText' => '',
    'buttonLink' => 'index',
])

<div class="grid gap-y-4 px-4 md:grid-cols-4">
	<x-ui.spacer class="place-self-end pb-5 max-md:pl-4 md:pr-8" type="xs">
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

		<flux:button href="{{ route($buttonLink) }}" icon:trailing="arrow" inset variant="ghost">{{ $buttonText }}</flux:button>

	</x-ui.spacer>

	<div class="relative col-span-3">
		<div class="relative flex flex-wrap items-center justify-center gap-2 overflow-x-hidden border border-gray-300">

			<div class="carousel carousel-start">
				<div class="carousel-item w-1/3">
					<x-ui.spacer class="border-l border-gray-300 p-5" type="xs">

						<div class="aspect-4/3 overflow-hidden">
							<img alt="Hero" class="w-full object-cover" src="/img/blog1.jpg">
						</div>

						<h2 class="text-pretty uppercase">Bukiety warzywne i&nbsp;owocowe</h2>
						<p class="prose text-[10px]/[14px] uppercase text-gray-700">Planujesz ślub? Pozwól nam zadbać o&nbsp;kompleksową aranżację Twojej uroczystości: od bukietu dla panny młodej, przez dekoracje florystyczne, po oprawę graficzną.</p>
						<p>&nbsp;</p>
						<flux:button href="{{ route('index') }}" icon:trailing="arrow" inset variant="ghost">dowiedz się więcej</flux:button>
					</x-ui.spacer>
				</div>

				<div class="carousel-item w-1/3">
					<x-ui.spacer class="border-l border-gray-300 p-5" type="xs">

						<div class="aspect-4/3 overflow-hidden">
							<img alt="Hero" class="w-full object-cover" src="/img/blog1.jpg">
						</div>

						<h2 class="text-pretty uppercase">Bukiety warzywne i&nbsp;owocowe</h2>
						<p class="prose text-[10px]/[14px] uppercase text-gray-700">Planujesz ślub? Pozwól nam zadbać o&nbsp;kompleksową aranżację Twojej uroczystości: od bukietu dla panNy młodej, przez dekoracje florystyczne, po oprawę graficzną.</p>
						<p>&nbsp;</p>
						<flux:button href="{{ route('index') }}" icon:trailing="arrow" inset variant="ghost">dowiedz się więcej</flux:button>
					</x-ui.spacer>
				</div>

				<div class="carousel-item w-1/3">
					<x-ui.spacer class="border-l border-gray-300 p-5" type="xs">

						<div class="aspect-4/3 overflow-hidden">
							<img alt="Hero" class="w-full object-cover" src="/img/blog1.jpg">
						</div>

						<h2 class="text-pretty uppercase">Bukiety warzywne i&nbsp;owocowe</h2>
						<p class="prose text-[10px]/[14px] uppercase text-gray-700">Planujesz ślub? Pozwól nam zadbać o&nbsp;kompleksową aranżację Twojej uroczystości: od bukietu dla panNy młodej, przez dekoracje florystyczne, po oprawę graficzną.</p>
						<p>&nbsp;</p>
						<flux:button href="{{ route('index') }}" icon:trailing="arrow" inset variant="ghost">dowiedz się więcej</flux:button>
					</x-ui.spacer>
				</div>

				<div class="carousel-item w-1/3">
					<x-ui.spacer class="border-l border-gray-300 p-5" type="xs">

						<div class="aspect-4/3 overflow-hidden">
							<img alt="Hero" class="w-full object-cover" src="/img/blog1.jpg">
						</div>

						<h2 class="text-pretty uppercase">Bukiety warzywne i&nbsp;owocowe</h2>
						<p class="prose text-[10px]/[14px] uppercase text-gray-700">Planujesz ślub? Pozwól nam zadbać o&nbsp;kompleksową aranżację Twojej uroczystości: od bukietu dla panNy młodej, przez dekoracje florystyczne, po oprawę graficzną.</p>
						<p>&nbsp;</p>
						<flux:button href="{{ route('index') }}" icon:trailing="arrow" inset variant="ghost">dowiedz się więcej</flux:button>
					</x-ui.spacer>
				</div>

			</div>

			{{-- <div class="flex flex-row">
				<x-slot img="blog1.jpg" text="Planujesz ślub? Pozwól nam zadbać o&nbsp;kompleksową aranżację Twojej uroczystości: od bukietu dla panNy młodej, przez dekoracje florystyczne, po oprawę graficzną." title="Bukiety warzywne i&nbsp;owocowe " />
				<x-slot class="" img="blog2.jpg" text="Zbliża się koniec roku, chrzest lub komunia? Organizujesz imprezę firmową, wieczór panieński lub inne wydarzenie? przygotujemy Ci piękną aranżację kwiatową." title="dwór konstancin - ślub w&nbsp;plenerze" />
				<x-slot class="" img="blog3.jpg" text="Chcesz udekorować przestrzeń swojej restauracji, recepcję w hotelu, biuro? Planujesz sesję zdjęciową? skontaktuj sie z nami, z&nbsp;przyjemnością się tym zajmiemy." title="hotel borowina *** - przyjęcie pod Warszawą" />

				<x-slot img="blog1.jpg" text="Planujesz ślub? Pozwól nam zadbać o&nbsp;kompleksową aranżację Twojej uroczystości: od bukietu dla panNy młodej, przez dekoracje florystyczne, po oprawę graficzną." title="Bukiety warzywne i&nbsp;owocowe " />
				<x-slot class="" img="blog2.jpg" text="Zbliża się koniec roku, chrzest lub komunia? Organizujesz imprezę firmową, wieczór panieński lub inne wydarzenie? przygotujemy Ci piękną aranżację kwiatową." title="dwór konstancin - ślub w&nbsp;plenerze" />
				<x-slot class="" img="blog3.jpg" text="Chcesz udekorować przestrzeń swojej restauracji, recepcję w hotelu, biuro? Planujesz sesję zdjęciową? skontaktuj sie z nami, z&nbsp;przyjemnością się tym zajmiemy." title="hotel borowina *** - przyjęcie pod Warszawą" />

			</div> --}}
		</div>
		<div class="absolute inset-x-0 -bottom-12">

			<div class="text-center text-7xl text-green-600">

				<a class="text-gray-300" href="#"> . </a>
				<a href="#"> . </a>
				<a href="#"> . </a>

			</div>
		</div>
	</div>
</div>
