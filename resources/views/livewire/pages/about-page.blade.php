<?php

use App\Models\Photo;
use Livewire\Volt\Component;
use App\Actions\SEOManager;

new class extends Component {
    public function mount(): void
    {
        SEOManager::title(__('texts.about_header'));
        SEOManager::description(__('texts.about'));
    }

    public function with(): array
    {
        return [
            'heroImg' => Photo::find(101),
        ];
    }
}; ?>

<x-ui.spacer class="lg:-mt-42 -mt-34" type="md">
	<div>
		<x-hero :$heroImg text="{{ __('texts.about') }}" title="{{ __('texts.about_header') }}" />
	</div>

</x-ui.spacer>
