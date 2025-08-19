<?php

use Livewire\Volt\Component;
use App\Actions\SEOManager;
use App\Models\Photo;

new class extends Component {
    public function mount(): void
    {
        SEOManager::title(__('terms.title'));
        SEOManager::description(__('terms.meta_description'));
    }
    public function with(): array
    {
        return [
            'heroImg' => Photo::find(103),
        ];
    }
}; ?>
<x-ui.spacer class="lg:-mt-42 -mt-34" pb type="md">

	<x-hero :heroImg="$heroImg" text="{!! __('terms.intro') !!}" title="{!! __('terms.title') !!}" />

	<div class="prose prose-sm mx-auto px-5">

		@lang('terms.text')

	</div>
</x-ui.spacer>
