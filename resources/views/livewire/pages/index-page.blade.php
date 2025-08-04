<?php

use Livewire\Volt\Component;

new class extends Component {
    // public function with(): array
    // {
    //     return [
    //         'fonts' => Font::with(['designers', 'weights', 'packs'])
    //             ->where('enabled', 1)
    //             ->orderBy('created_at', 'desc')
    //             ->limit(9)

    //             ->get(),
    //     ];
    // }
    public function rendering(\Illuminate\View\View $view): void
    {
        // seo()->title('Capitalics Warsaw Type Foundry', template: false);
    }
}; ?>

<div class="mt-24">
	main page
</div>
@script
	<script></script>
@endscript
