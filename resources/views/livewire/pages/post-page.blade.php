<?php

use App\Models\Post;
use Livewire\Volt\Component;
use App\Actions\SEOManager;

new class extends Component {
    public Post $post;

    public function mount(Post $post): void
    {
        $this->post = $post;

        SEOManager::title($this->post->title);
        SEOManager::description($this->post->meta_description);
    }
    public function with(): array
    {
        return [
            'blogItems' => Post::whereNot('id', $this->post->id)->get(),
        ];
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

		<x-works.masonry :showButton="false" :workItems="$this->post->photos" />

		<div class="px-5">
			<x-index.blog-items :items="$blogItems" buttonText="<span class='hidden lg:inline'>przeglądaj</span> artykuły" text="<p>Zapraszamy do zapoznania się z pozostałymi wpisami na naszym blogu.</p>" title="Blog" />
		</div>

	</x-ui.spacer>
</div>
