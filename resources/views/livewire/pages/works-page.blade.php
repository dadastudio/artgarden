<?php

use App\Models\Post;
use Livewire\Volt\Component;

new class extends Component {
    public $terms = false;
    public $industry = false;
    public function with(): array
    {
        return [
            'workItems' => Post::factory()->count(20)->make(),
        ];
    }
    public function rendering(\Illuminate\View\View $view): void
    {
        // seo()->title('Capitalics Warsaw Type Foundry', template: false);
    }
}; ?>
<div>
	<x-ui.spacer py type="md">

		<div class="relative flex-row lg:flex">
			<div class="2xl:w-75/100 xl:w-70/100 lg:w-65/100 flex flex-row px-5 md:w-full lg:px-16 lg:py-10 xl:px-20">
				<img class="max-h-max w-full border border-gray-100 p-5" src="/img/oferta.jpg">

			</div>

			<x-index.hero-text buttonText="skontaktuj się z nami" text="<p>Zapraszamy do zapoznania się z naszym portfolio, w którym prezentujemy wybrane realizacje – od kameralnych bukietów po aranżacje na duże uroczystości. Każda kompozycja to efekt pasji, doświadczenia i indywidualnego podejścia do potrzeb klienta.  </p><p>Wierzymy, że nasze projekty przemówią do Twojej wyobraźni i pomogą Ci podjąć decyzję o współpracy. Kwiaty opowiadają historie –zobacz, jaką możemy stworzyć razem :)</p>"
				title="Realizacje">

				<div class="flex flex-row items-center gap-x-5">

					<img class="max-w-max" src="/img/download.svg" />
					<p class="max-w-[220px] text-[10px]/snug uppercase">Jeśli chcesz zobaczyć pełen przekrój naszych prac, pobierz katalog ze wszystkimi realizacjami.
					</p>
				</div>
			</x-index.hero-text>
		</div>

		<x-works.masonry :workItems="$workItems" />

	</x-ui.spacer>

</div>
