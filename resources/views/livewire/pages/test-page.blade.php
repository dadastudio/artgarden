<?php

use Livewire\Volt\Component;
use App\Actions\SEOManager;
use App\Models\Photo;
new class extends Component {
    public function mount(): void {}
    public function with(): array
    {
        return [];
    }
}; ?>
<x-ui.spacer class="" pb type="md">

	<div class="prose prose-sm mx-auto px-5">

		@livewire('upload-photo')

	</div>
</x-ui.spacer>
