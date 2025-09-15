<div>
	{{-- A good traveler has no fixed plans and is not intent upon arriving. --}}

	<form wire:submit="save">
		@if ($photo)
			<img src="{{ $photo->temporaryUrl() }}">
		@endif

		<flux:input label="Logo" type="file" wire:model="photo" />

		@error('photo')
			<span class="error">{{ $message }}</span>
		@enderror

		<flux:button type="submit">Save photo</flux:button>
	</form>

</div>
