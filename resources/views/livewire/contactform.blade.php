<?php

use Livewire\Volt\Component;

new class extends Component {
    public $email;
    public $name;
    public $phone;
    public $type;
    public $date;
    public $location;
    public $additional_info;
    public $terms = false;
    public $survey;
    public $successMessage;
    public $errorMessage;

    public function rules()
    {
        return [
            'email' => 'required|email',
            'name' => 'required|string',
            'phone' => 'nullable|string',
            'type' => 'required|string',
            'date' => 'nullable|date',
            'location' => 'nullable|string',
            'additional_info' => 'nullable|string',
            'terms' => 'accepted',
            'survey' => 'nullable|string',
        ];
    }

    public function sendMail()
    {
        $validated = $this->validate();
        try {
            \Mail::raw("Imię i nazwisko: {$this->name}\n" . "Email: {$this->email}\n" . "Telefon: {$this->phone}\n" . "Typ wydarzenia: {$this->type}\n" . "Data: {$this->date}\n" . "Lokalizacja: {$this->location}\n" . "Dodatkowe informacje: {$this->additional_info}\n" . "Jak się dowiedział: {$this->survey}\n", function ($message) {
                $message->to(config('mail.from.address'))->subject('Nowa wiadomość z formularza kontaktowego');
            });
            $this->reset(['email', 'name', 'phone', 'type', 'date', 'location', 'additional_info', 'terms', 'survey']);
            $this->successMessage = __('Dziękujemy za wysłanie wiadomości! Skontaktujemy się z Tobą wkrótce.');
            $this->errorMessage = null;
        } catch (\Exception $e) {
            $this->errorMessage = __('Wystąpił błąd podczas wysyłania wiadomości. Spróbuj ponownie później.');
            $this->successMessage = null;
        }
    }
}; ?>

<x-ui.spacer class="md:border-l md:pl-8">

	@if ($successMessage)
		<div class="mb-4 rounded bg-green-100 p-4 text-green-800">{{ $successMessage }}</div>
	@endif
	@if ($errorMessage)
		<div class="mb-4 rounded bg-red-100 p-4 text-red-800">{{ $errorMessage }}</div>
	@endif
	<x-ui.spacer type="xxs">

		<h2 class="text-pretty">@lang('form.title')</h2>
		<p class="text-xs text-gray-700">* Pola obowiązkowe</p>
	</x-ui.spacer>

	<form wire:submit.prevent="sendMail">
		<x-ui.spacer pb type="xs">

			<flux:input icon="pencil" label="{{ __('form.email') }}*" size="sm" type="email" wire:model.defer="email" />

			<flux:input icon="pencil" label="{{ __('form.name') }}*" size="sm" wire:model.defer="name" />
			<flux:input icon="pencil" label="{{ __('form.phone') }}*" size="sm" wire:model.defer="phone" />

			{{-- <flux:select label="{{ __('form.type') }}" placeholder="wybierz..." wire:model.defer="type">
				<flux:select.option value="{{ __('form.type_option_1') }}">{{ __('form.type_option_1') }}</flux:select.option>
				<flux:select.option value="{{ __('form.type_option_2') }}">{{ __('form.type_option_2') }}</flux:select.option>
				<flux:select.option value="{{ __('form.type_option_3') }}">{{ __('form.type_option_3') }}</flux:select.option>
				<flux:select.option value="{{ __('form.type_option_4') }}">{{ __('form.type_option_4') }}</flux:select.option>
				<flux:select.option value="{{ __('form.type_option_5') }}">{{ __('form.type_option_5') }}</flux:select.option>
				<flux:select.option value="{{ __('form.type_option_6') }}">{{ __('form.type_option_6') }}</flux:select.option>
			</flux:select> --}}

			<flux:input icon="pencil" label="{{ __('form.type') }}*" size="sm" wire:model.defer="type" />

			<flux:input icon="pencil" label="{{ __('form.date') }}*" size="sm" type="date" wire:model.defer="date" />

			<flux:input icon="pencil" label="{{ __('form.location') }}*" size="sm" wire:model.defer="location" />

			<div class="relative">

				<div class="absolute left-0 top-9">
					<flux:icon.pencil />
				</div>
				<flux:textarea label="{{ __('form.additional_info') }}" size="sm" wire:model.defer="additional_info" />
			</div>

			<flux:field variant="inline">
				<flux:checkbox wire:model.defer="terms" />
				<flux:label>@lang('form.terms')*</flux:label>
				<flux:error name="terms" />
			</flux:field>

			<x-ui.spacer py type="sm">
				<h2 class="text-pretty">@lang('form.survey_title')</h2>

				<flux:radio.group wire:model.defer="survey">
					<flux:radio label="{{ __('form.survey_1') }}" value="1" />
					<flux:radio label="{{ __('form.survey_2') }}" value="2" />
					<flux:radio label="{{ __('form.survey_3') }}" value="3" />
					<flux:radio label="{{ __('form.survey_4') }}" value="4" />
					<flux:radio label="{{ __('form.survey_5') }}" value="5" />
				</flux:radio.group>
			</x-ui.spacer>

			<div class="flex justify-end">

				<flux:button icon:trailing="arrow" type="submit" variant="ghost">@lang('form.send')</flux:button>

			</div>

		</x-ui.spacer>

	</form>
</x-ui.spacer>
