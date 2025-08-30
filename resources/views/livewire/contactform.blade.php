<?php

use App\Models\LanguageLine;
use Livewire\Volt\Component;
use Spatie\Honeypot\Http\Livewire\Concerns\UsesSpamProtection;
use Spatie\Honeypot\Http\Livewire\Concerns\HoneypotData;
use Illuminate\Support\Facades\Mail;

new class extends Component {
    use UsesSpamProtection;

    public HoneypotData $extraFields;
    public $email = '';
    public $name = '';
    public $phone = '';
    public string $type = '';
    public $date = '';
    public $location = '';
    public $additional_info = '';
    public $terms = false;
    public $survey = '';
    public $successMessage = '';
    public $errorMessage = '';
    public $options;
    public $isSubmitting = false;
    public $minDate;
    public $maxDate;

    public function mount()
    {
        $this->extraFields = new HoneypotData();
        $this->options = LanguageLine::where('key', 'like', 'type_option%')->get();

        // Set date constraints
        $this->minDate = now()->format('Y-m-d');
        $this->maxDate = now()->addYears(2)->format('Y-m-d');

        // Pre-fill with test data in local environment
        if (app()->environment('local')) {
            $this->email = 'farmazone@gmail.com';
            $this->name = fake()->name();
            $this->phone = '+48 ' . fake()->numberBetween(100000000, 999999999);
            $this->type = $this->options->first()?->text[app()->getLocale()] ?? '';
            $this->date = now()->addDays(7)->format('Y-m-d');
            $this->location = fake()->city();
            $this->additional_info = fake()->paragraph(2);
            $this->terms = true;
        }
    }

    public function rules()
    {
        return [
            'email' => ['required', 'email:rfc,dns', 'max:255'],
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string', 'max:20', 'regex:/^[\+\s\d\-\(\)\/\*\.\,\;\: ]+$/'],
            'type' => ['required', 'string'],
            'date' => ['required', 'date', 'after_or_equal:today', 'before_or_equal:' . $this->maxDate],
            'location' => ['required', 'string', 'max:255'],
            'additional_info' => ['nullable', 'string', 'max:1000'],
            'terms' => ['accepted'],
            'survey' => ['nullable', 'string'],
        ];
    }

    protected $messages = [
        'email.required' => 'Adres email jest wymagany',
        'email.email' => 'Proszę podać poprawny adres email',
        'name.required' => 'Imię i nazwisko jest wymagane',
        'phone.required' => 'Numer telefonu jest wymagany',
        'phone.regex' => 'Proszę podać poprawny numer telefonu',
        'type.required' => 'Proszę wybrać typ wydarzenia',
        'date.required' => 'Proszę podać datę',
        'date.after_or_equal' => 'Data nie może być z przeszłości',
        'date.before_or_equal' => 'Maksymalna data to 2 lata od dziś',
        'location.required' => 'Lokalizacja jest wymagana',
        'terms.accepted' => 'Musisz zaakceptować regulamin',
    ];

    public function with(): array
    {
        return [
            'surveys' => LanguageLine::where('key', 'like', 'survey_%')->get(),
        ];
    }

    public function sendMail()
    {
        $this->isSubmitting = true;
        $this->resetErrorBag();
        $this->resetValidation();

        try {
            $this->protectAgainstSpam();
            $validated = $this->validate();

            $emailData = [
                'name' => $validated['name'],
                'email' => $validated['email'],
                'phone' => $validated['phone'],
                'type' => $validated['type'],
                'date' => $validated['date'],
                'location' => $validated['location'],
                'additional_info' => $validated['additional_info'],
                'survey' => $validated['survey'] ?? 'Nie podano',
            ];

            Mail::send('emails.contact', $emailData, function ($message) use ($validated) {
                $message
                    ->replyTo($validated['email'])
                    ->to(config('mail.from.address'))
                    ->subject('Nowa wiadomość z formularza kontaktowego - ' . $validated['name']);
            });

            // Send confirmation to user

            if (config('mail.send_confirmation', true)) {
                Mail::send('emails.confirmation', $emailData, function ($message) use ($validated) {
                    $message->replyTo(config('mail.replyTo.address'))->to($validated['email'])->subject('Potwierdzenie otrzymania wiadomości');
                });
            }

            $this->reset(['email', 'name', 'phone', 'type', 'date', 'location', 'additional_info', 'terms', 'survey']);
            $this->successMessage = __('form.message_sent');
            $this->errorMessage = '';

            // Close modal after 5 seconds
            $this->dispatch('close-message-modal');
        } catch (\Exception $e) {
            logger()->error('Contact form error: ' . $e->getMessage(), [
                'exception' => $e,
                'trace' => $e->getTraceAsString(),
            ]);

            $this->errorMessage = 'Error: ' . $e->getMessage(); // __('Wystąpił błąd podczas wysyłania wiadomości. Prosimy spróbować później.');
            $this->successMessage = '';
        } finally {
            $this->isSubmitting = false;
            Flux::modal('messageModal')->show();
        }
    }
}; ?>

<x-ui.spacer class="md:border-l md:pl-8" x-data="{ showModal: false }">

	<flux:modal name="messageModal">
		<x-ui.spacer class="border border-green-400 px-8 text-center font-semibold" py type="xs">
			@if ($successMessage)
				<div class="text-pretty">{!! $this->successMessage !!}</div>

				<p>&nbsp;</p>
				<div class="flex justify-center"><img alt="ArtGardenLogo" class="max-w-36" src="{{ asset('img/logo.svg') }}"></div>
			@endif
			@if ($errorMessage)
				<div class="text-red-500">
					{!! $this->errorMessage !!}
				</div>
			@endif

		</x-ui.spacer>

	</flux:modal>

	<x-ui.spacer type="xxs">

		<h2 class="text-pretty">@lang('form.title')</h2>
		<p class="text-xs text-gray-700">* @lang('form.required')</p>
	</x-ui.spacer>

	<form wire:submit="sendMail">
		@csrf
		<x-honeypot livewire-model="extraFields" />
		<x-ui.spacer pb type="xs">

			<flux:input autocomplete="email" icon="pencil" label="{{ __('form.email') }}*" required size="sm" type="email" wire:model="email" />

			<flux:input autocomplete="name" icon="pencil" label="{{ __('form.name') }}*" required size="sm" wire:model="name" />
			<flux:input autocomplete="tel" icon="pencil" label="{{ __('form.phone') }}*" required size="sm" wire:model="phone" />

			<div class="relative">

				<div class="absolute left-0 top-[35px]">
					<flux:icon.pencil />
				</div>
				<flux:select label="{{ __('form.type') }}" placeholder="{{ __('form.choose') }}..." required size="sm" wire:model="type">

					@foreach ($options as $option)
						<flux:select.option value="{{ $option->text[app()->getLocale()] }}">{{ $option->text[app()->getLocale()] }}</flux:select.option>
					@endforeach

				</flux:select>
			</div>

			<flux:input autocomplete="date" icon="pencil" label="{{ __('form.date') }}*" required size="sm" type="date" wire:model="date" />

			<flux:input autocomplete="address" icon="pencil" label="{{ __('form.location') }}*" required size="sm" wire:model="location" />

			<div class="relative">

				<div class="absolute left-0 top-[35px]">
					<flux:icon.pencil />
				</div>
				<flux:textarea label="{{ __('form.additional_info') }}" size="sm" wire:model="additional_info" />
			</div>

			<flux:field required variant="inline">
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

				<flux:button icon:trailing="arrow" type="submit" variant="ghost" wire:loading.attr="disabled">
					@lang('form.send')
					{{-- <span wire:loading.remove>@lang('form.send')</span>
					<span wire:loading wire:target="sendMail">Wysyłanie...</span> --}}
				</flux:button>

			</div>

		</x-ui.spacer>

	</form>
</x-ui.spacer>
@script
	<script>
		document.addEventListener('livewire:initialized', () => {
			@this.on('close-message-modal', () => {
				setTimeout(() => {
					Flux.modal('messageModal').close();
				}, 5000);
			});
		});
	</script>
@endscript
