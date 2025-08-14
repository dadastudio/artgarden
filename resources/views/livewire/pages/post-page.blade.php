<?php

use App\Models\Post;
use Livewire\Volt\Component;

new class extends Component {
    public $terms = false;
    public $industry = false;
    public Post $post;

    public function with(): array
    {
        return [
            'blogItems' => Post::whereNot('id', $this->post->id)->get(),

            'mediaItem' => $this->post->getFirstMedia(),
            'photos' => $this->post->photos,
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

				{{ $post->getFirstMedia()->img('main')->attributes(['class' => 'max-h-max w-full border border-gray-100 p-5']) }}

			</div>

			<x-index.hero-text text="{!! $post->text !!}" title="{{ $post->title }}" />

		</div>

		<x-works.masonry :showButton="false" :workItems="$photos" />

		<x-index.blog-items :items="$blogItems" buttonText="<span class='hidden lg:inline'>przeglądaj</span> artykuły" text="<p>Zapraszamy do zapoznania się z pozostałymi wpisami na naszym blogu.</p>" title="Blog" />

	</x-ui.spacer>
</div>
