<?php

use Livewire\Volt\Component;
use App\Actions\SEOManager;
use Spatie\SchemaOrg\Schema;

new class extends Component {
    public function mount(): void
    {
        SEOManager::title(__('ui.contact'));
        SEOManager::description(__('consultations.text'));

        $graph = Schema::contactPage()->about(SEOManager::organization());

        seo()->jsonLdImport($graph);
    }
}; ?>
<div>

</div>
