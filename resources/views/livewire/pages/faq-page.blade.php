<?php

use Livewire\Volt\Component;
use App\Actions\SEOManager;
use App\Models\Photo;

new class extends Component {
    public function mount(): void
    {
        SEOManager::title(__('faq.title'));
        SEOManager::description(__('faq.meta_description'));
    }

    public function with(): array
    {
        return [
            'heroImg' => Photo::find(103),
        ];
    }
}; ?>
<x-ui.spacer class="lg:-mt-42 -mt-34" pb type="md">

	<x-hero :heroImg="$heroImg" text="{!! __('faq.intro') !!}" title="{!! __('faq.title') !!}" />

	<div class="prose mx-auto px-5">
		{!! __('faq.text') !!}
	</div>
</x-ui.spacer>
