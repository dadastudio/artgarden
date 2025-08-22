<?php

use App\Models\Post;
use Livewire\Volt\Component;
use App\Actions\SEOManager;
use Spatie\SchemaOrg\Schema;

new class extends Component {
    public Post $post;

    public function mount(Post $post): void
    {
        $this->post = $post;

        SEOManager::title($this->post->title);
        SEOManager::description($this->post->meta_description);

        $examples = [];
        foreach ($this->post->photos as $photo) {
            $examples[] = Schema::creativeWork()
                ->image($photo->getFirstMedia()->getUrl('main'))
                ->abstract($photo->title);
        }
        $graph = Schema::blogPosting()
            ->name($this->post->title)
            ->exampleOfWork($examples)
            ->articleBody(strip_tags($this->post->text))
            ->publisher(SEOManager::organization());

        seo()->jsonLdImport($graph);
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

		<x-hero :heroImg="$post" :imgFull="false" :is_left="false" text="{!! $post->text !!}" title="{{ $post->title }}" />

		<x-works.masonry :showButton="false" :workItems="$this->post->photos" />

		<div class="px-5">
			<x-index.blog-items :items="$blogItems" buttonText="<span class='hidden lg:inline'>przeglądaj</span> artykuły" text="<p>Zapraszamy do zapoznania się z pozostałymi wpisami na naszym blogu.</p>" title="Blog" />
		</div>

	</x-ui.spacer>
</div>
