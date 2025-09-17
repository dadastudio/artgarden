<?php

use App\Models\Service;
use Livewire\Volt\Component;
use App\Actions\SEOManager;
use App\Models\Photo;

new class extends Component {
    public $services;

    public function mount(): void
    {
        // $this->services = Service::all();

        SEOManager::title(__(key: 'ui.offer'));

        SEOManager::description(__('texts.offer'));
    }
}; ?>
<div>
	<livewire:offer />

</div>
