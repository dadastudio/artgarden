<?php

use App\Models\Post;
use App\Models\Photo;
use Livewire\Volt\Component;
use App\Actions\SEOManager;
use Spatie\SchemaOrg\Schema;

new class extends Component {
    public function mount(): void
    {
        SEOManager::title(__('ui.blog'));
        SEOManager::description(__('blog.meta_description'));

        $posts = Post::all();

        $items = $posts
            ->values()
            ->map(function ($post, $i) {
                return Schema::blogPosting()
                    ->position($i + 1)
                    ->url(route('post', $post->slug))
                    ->name($post->title);
            })
            ->all();

        $graph = Schema::blog()->blogPost($items)->name(__('ui.blog'))->url(route('blog'))->publisher(SEOManager::organization());
        // $graph = Schema::itemList()->itemListOrder('http://schema.org/ItemListOrderAscending')->itemListElement($items);

        seo()->jsonLdImport($graph);
    }

    public function with(): array
    {
        return [
            'blogItems' => Post::all(),
            'heroImg' => Photo::find(100),
        ];
    }
}; ?>
<x-ui.spacer class="lg:-mt-42 -mt-34" pb type="md">

	<x-hero :heroImg="$heroImg" text="{{ __('blog.text') }}" title="{{ __('ui.blog') }}" />

	<div class="grid max-sm:px-5 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">

		@foreach ($blogItems as $item)
			<x-slot buttonText="{!! __('ui.read_more_btn') !!}" class="-ml-px -mt-px" img="{{ $item->getFirstMedia()->getUrl('main') }}" route="{{ route('post', $item->slug) }}" text="{!! $item->text !!}" title="{!! $item->title !!}" />
		@endforeach

	</div>

</x-ui.spacer>
