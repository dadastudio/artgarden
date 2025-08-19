<?php

use App\Models\Post;
use Livewire\Volt\Component;
use App\Actions\SEOManager;

new class extends Component {
    public function mount(): void
    {
        SEOManager::title(__('ui.contact'));
        SEOManager::description(__('consultations.text'));
    }
}; ?>
<div>

</div>
