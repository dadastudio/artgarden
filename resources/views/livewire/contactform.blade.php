<?php

use Livewire\Volt\Component;
use Spatie\Honeypot\Http\Livewire\Concerns\UsesSpamProtection;
use Spatie\Honeypot\Http\Livewire\Concerns\HoneypotData;

new class extends Component {
    use UsesSpamProtection;
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
    public HoneypotData $extraFields;

    public function mount()
    {
        $this->extraFields = new HoneypotData();

        $this->email = fake()->email();
        $this->name = fake()->name();
        $this->phone = fake()->phoneNumber();
        $this->type = 'Wedding';
        $this->date = fake()->date();
        $this->location = fake()->city();
        $this->additional_info = fake()->text();
        $this->terms = true;
    }

    public function rules()
    {
        return [
            'email' => 'required|email',
            'name' => 'required|string',
            'phone' => 'required|string',
            'type' => 'required|string',
            'date' => 'required|date',
            'location' => 'required|string',
            'additional_info' => 'nullable|string',
            'terms' => 'accepted',
            'survey' => 'nullable|string',
        ];
    }

    public function sendMail()
    {
        $this->protectAgainstSpam();
        $validated = $this->validate();
        try {
            \Mail::raw("Imię i nazwisko: {$this->name}\n" . "Email: {$this->email}\n" . "Telefon: {$this->phone}\n" . "Typ wydarzenia: {$this->type}\n" . "Data: {$this->date}\n" . "Lokalizacja: {$this->location}\n" . "Dodatkowe informacje: {$this->additional_info}\n" . "Jak się dowiedział: {$this->survey}\n", function ($message) {
                $message->to(config('mail.from.address'))->subject('Nowa wiadomość z formularza kontaktowego');
            });
            $this->reset(['email', 'name', 'phone', 'type', 'date', 'location', 'additional_info', 'terms', 'survey']);
            $this->successMessage = __('messages.contact_success');
            $this->errorMessage = null;
        } catch (\Exception $e) {
            $this->errorMessage = __('messages.send_error');
            $this->successMessage = null;
        }
        Flux::modal('messageModal')->show();
    }
}; ?>

<x-ui.spacer class="md:border-l md:pl-8">

	<flux:modal name="messageModal">
		<x-ui.spacer class="border border-green-400 px-8 text-center font-semibold" py type="xs">

			<p class="text-[19px]">{!! __('messages.contactform_success_detailed') !!}</p>
			<p class="text-[19px]">{!! __('messages.contactform_signoff') !!}</p>
			<p>&nbsp;</p>
			<div class="flex justify-center"><img alt="ArtGardenLogo" class="max-w-36" src="{{ asset('img/logo.svg') }}"></div>

		</x-ui.spacer>
		{{-- @if ($successMessage)
			<div class="mb-4 rounded bg-green-100 p-4 text-green-800">{{ $successMessage }}</div>
		@endif
		@if ($errorMessage)
			<div class="mb-4 rounded bg-red-100 p-4 text-red-800">{{ $errorMessage }}</div>

			
		@endif --}}

	</flux:modal>

	<x-ui.spacer type="xxs">

		<h2 class="text-pretty">@lang('form.title')</h2>
		<p class="text-xs text-gray-700">@lang('messages.required_fields')</p>
	</x-ui.spacer>

	<form wire:submit.prevent="sendMail">
		<x-honeypot livewire-model="extraFields" />
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
					<flux:radio label="{{ __('form.survey_1') }}" value="{{ __('form.survey_1') }}" />
					<flux:radio label="{{ __('form.survey_2') }}" value="{{ __('form.survey_2') }}" />
					<flux:radio label="{{ __('form.survey_3') }}" value="{{ __('form.survey_3') }}" />
					<flux:radio label="{{ __('form.survey_4') }}" value="{{ __('form.survey_4') }}" />
					<flux:radio label="{{ __('form.survey_5') }}" value="{{ __('form.survey_5') }}" />
				</flux:radio.group>
			</x-ui.spacer>

			<div class="flex justify-end">

				<flux:button icon:trailing="arrow" type="submit" variant="ghost">@lang('form.send')</flux:button>

			</div>

		</x-ui.spacer>

	</form>
</x-ui.spacer>
