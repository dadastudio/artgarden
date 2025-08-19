<?php

use App\Models\LanguageLine;
use Livewire\Volt\Component;
use Spatie\Honeypot\Http\Livewire\Concerns\UsesSpamProtection;
use Spatie\Honeypot\Http\Livewire\Concerns\HoneypotData;

new class extends Component {
    use UsesSpamProtection;
    public $email;
    public $name;
    public $phone;
    public string $type;
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
        $this->type = '';
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

    public function with(): array
    {
        return [
            'options' => LanguageLine::where('key', 'like', 'type_option%')->get(),
            'surveys' => LanguageLine::where('key', 'like', 'survey_%')->get(),
        ];
    }

    public function sendMail()
    {
        $this->protectAgainstSpam();
        $validated = $this->validate();
        try {
            \Mail::raw("Imię i nazwisko: {$validated['name']}\n" . "Email: {$validated['email']}\n" . "Telefon: {$validated['phone']}\n" . "Typ wydarzenia: {$validated['type']}\n" . "Data: {$validated['date']}\n" . "Lokalizacja: {$validated['location']}\n" . "Dodatkowe informacje: {$validated['additional_info']}\n" . "Jak się dowiedział: {$validated['survey']}\n", function ($message) use ($validated) {
                $message->to($validated['email'])->subject('Nowa wiadomość z formularza kontaktowego');
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

			{!! __('form.message_sent') !!}

			{{-- <p class="text-[19px]">{!! __('form.message_sent') !!}</p>
			<p class="text-[19px]">{!! __('messages.contactform_signoff') !!}</p> --}}
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
		<p class="text-xs text-gray-700">* @lang('form.required')</p>
	</x-ui.spacer>

	<form wire:submit.prevent="sendMail">
		<x-honeypot livewire-model="extraFields" />
		<x-ui.spacer pb type="xs">

			<flux:input icon="pencil" label="{{ __('form.email') }}*" size="sm" type="email" wire:model="email" />

			<flux:input icon="pencil" label="{{ __('form.name') }}*" size="sm" wire:model="name" />
			<flux:input icon="pencil" label="{{ __('form.phone') }}*" size="sm" wire:model="phone" />

			<div class="relative">

				<div class="absolute left-0 top-[35px]">
					<flux:icon.pencil />
				</div>
				<flux:select label="{{ __('form.type') }}" placeholder="{{ __('form.choose') }}..." size="sm" wire:model="type">

					@foreach ($options as $option)
						<flux:select.option value="{{ $option->text[app()->getLocale()] }}">{{ $option->text[app()->getLocale()] }}</flux:select.option>
					@endforeach

				</flux:select>
			</div>

			{{-- <flux:input icon="pencil" label="{{ __('form.type') }}*" size="sm" wire:model="type" /> --}}

			<flux:input icon="pencil" label="{{ __('form.date') }}*" size="sm" type="date" wire:model="date" />

			<flux:input icon="pencil" label="{{ __('form.location') }}*" size="sm" wire:model="location" />

			<div class="relative">

				<div class="absolute left-0 top-[35px]">
					<flux:icon.pencil />
				</div>
				<flux:textarea label="{{ __('form.additional_info') }}" size="sm" wire:model="additional_info" />
			</div>

			<flux:field variant="inline">
				<flux:checkbox wire:model="terms" />
				<flux:label>@lang('form.terms')*</flux:label>
				<flux:error name="terms" />
			</flux:field>

			<x-ui.spacer py type="sm">
				<h2 class="text-pretty">@lang('form.survey_title')</h2>

				<flux:radio.group wire:model="survey">
					@foreach ($surveys as $survey)
						<flux:radio label="{{ $survey->text[app()->getLocale()] }}" value="{{ $survey->text[app()->getLocale()] }}" />
					@endforeach
				</flux:radio.group>
			</x-ui.spacer>

			<div class="flex justify-end">

				<flux:button icon:trailing="arrow" type="submit" variant="ghost">@lang('form.send')</flux:button>

			</div>

		</x-ui.spacer>

	</form>
</x-ui.spacer>
