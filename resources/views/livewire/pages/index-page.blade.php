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

<x-ui.spacer class="-mt-42" type="md">
	<div>
		<img alt="Hero" class="w-full" src="/img/Hero.png">

		<div class="bg-green-950 px-10 py-24 text-center text-white">
			<p class="text-6xl leading-tight">“Dla mnie kwiaty</br> są sposobem życia”</p>
			<p class="pt-16 text-xs uppercase tracking-wider text-gray-100">Marc Chagall</p>
		</div>
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
		<x-slot />
		<x-slot class="-ml-px" />
		<x-slot class="-ml-px" />
	</div>
	<div class="bg-green-950 px-10 py-24 text-center text-white">
		<p class="text-6xl leading-tight">“Piękno kwiatu nie tkwi w&nbsp;jego kształcie,</br> lecz w&nbsp;tym, jak go postrzegasz”</p>
		<p class="pt-16 text-xs uppercase tracking-wider text-gray-100">przysłowie Japońskie</p>
	</div>
</x-ui.spacer>
@script
	<script></script>
@endscript
