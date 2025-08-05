<?php

use Livewire\Volt\Component;

new class extends Component {
    // public function with(): array
    // {
    //     return [
    //         'fonts' => Font::with(['designers', 'weights', 'packs'])
    //             ->where('enabled', 1)
    //             ->orderBy('created_at', 'desc')
    //             ->limit(9)

    //             ->get(),
    //     ];
    // }
    public function rendering(\Illuminate\View\View $view): void
    {
        // seo()->title('Capitalics Warsaw Type Foundry', template: false);
    }
}; ?>

<x-ui.spacer class="lg:-mt-42 -mt-30" type="md">
	<div>
		<img alt="Hero" class="w-full" src="/img/Hero.png">

		<x-index.baner quoteAuthor="Marc Chagall" quote="Dla mnie kwiaty</br> są sposobem życia" />
	</div>
	<div class="flex flex-row gap-24 px-24">

		<img alt="Hero" class="w-2/3 border border-gray-100 p-5" src="/img/oferta.jpg">

		<div class="flex items-end pb-6 text-sm">
			<div class="prose prose-sm">
				<h2>Oferta</h2>
				<p>Art Garden z wielką troską zajmuje się kompleksową realizacją zadań związanych z profesjonalną florystyką, obecną w naszym życiu przy różnych okazjach. Oprócz pięknych aranżacji kwiatowych pomagamy stworzyć klimatyczny dekor, tak, aby wszystko tworzyło niezapomniany efekt. Podchodzimy bardzo indywidualnie do Waszych potrzeb, jesteśmy w stanie zaproponować wiele ciekawych rozwiązań bazując na naszym wieloletnim doświadczeniu.</p>
			</div>
		</div>
	</div>

	<div class="grid grid-cols-4">
		<x-ui.spacer class="place-self-end pb-5 pr-8">
			<div class="prose prose-sm">
				<p>Działamy głównie w Warszawie i okolicy (do 50 km). Ale jesteśmy też otwarci na propozycje z&nbsp;innych zakątków Polski.</p>

				<p>Realizujemy dostawy na terenie całej Warszawy, lub umożliwiamy odbiór zamówień z&nbsp;naszej pracowni florystycznej.</p>
			</div>
			<a class="btn" href="{{ route('index') }}">skontaktuj się z nami</a>

		</x-ui.spacer>
		<x-slot img="oferta1.jpg" text="Planujesz ślub? Pozwól nam zadbać o kompleksową aranżację Twojej uroczystości: od bukietu dla panNy młodej, przez dekoracje florystyczne, po oprawę graficzną." title="florystyka</br>ślubna" />
		<x-slot img="oferta2.jpg" text="Zbliża się koniec roku, chrzest lub komunia? Organizujesz imprezę firmową, wieczór panieński lub inne wydarzenie? przygotujemy Ci piękną aranżację kwiatową." title="florystyka</br>okolicznościowa" />
		<x-slot img="oferta3.jpg" text="Chcesz udekorować przestrzeń swojej restauracji, recepcję w hotelu, biuro? Planujesz sesję zdjęciową? skontaktuj sie z nami, z przyjemnością się tym zajmiemy." title="florystyka</br>dla firm" />
	</div>

	<div>
		<x-index.baner quoteAuthor="przysłowie Japońskie" quote="Piękno kwiatu nie tkwi w jego kształcie,</br> lecz w tym, jak go postrzegasz" />

		<img alt="Hero" class="w-full" src="/img/Foto1.png">

		<div class="bg-green-950 px-10 py-10 text-center text-white">

			<div class="flex flex-row gap-24 px-20">
				<div class="flex w-2/3 flex-row items-end gap-2">
					<img alt="Hero" class="w-2/3 border border-green-900 p-2" src="/img/realizacje1.jpg">
					<div class="flex w-1/3 flex-col gap-2">
						<img alt="Hero" class="w-full border border-green-900 p-2" src="/img/realizacje2.jpg">
						<img alt="Hero" class="w-full border border-green-900 p-2" src="/img/realizacje3.jpg">
					</div>
				</div>
				<div class="f flex items-end pb-6 text-left text-sm">
					<x-ui.spacer>
						<div class="prose prose-sm prose-invert">
							<h2>Realizacje</h2>
							<p>Art Garden z wielką troską zajmuje się kompleksową realizacją zadań związanych z&nbsp;profesjonalną florystyką, obecną w&nbsp;naszym życiu przy różnych okazjach. Oprócz pięknych aranżacji kwiatowych pomagamy stworzyć klimatyczny dekor, tak, aby wszystko tworzyło niezapomniany efekt. Podchodzimy bardzo indywidualnie do Waszych potrzeb, jesteśmy w&nbsp;stanie zaproponować wiele ciekawych rozwiązań bazując na naszym wieloletnim doświadczeniu.</p>
						</div>

						<a class="btn" href="{{ route('index') }}">obejrzyj więcej</br>naszych realizacji</a>
					</x-ui.spacer>
				</div>
			</div>

		</div>

	</div>
</x-ui.spacer>
@script
	<script></script>
@endscript
