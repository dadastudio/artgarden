<?php

use Livewire\Volt\Component;

new class extends Component {
    //
}; ?>

<x-ui.spacer class="md:border-l md:pl-8">

	<h2 class="text-pretty">@lang('form.title')</h2>

	<form>
		<x-ui.spacer pb type="xs">

			<flux:input label="{{ __('form.email') }}" type="email" />

			<flux:input label="{{ __('form.name') }}" />
			<flux:input label="{{ __('form.phone') }}" />

			<flux:select label="{{ __('form.type') }}" placeholder="wybierz">
				<flux:select.option value="{{ __('form.type_option_1') }}">{{ __('form.type_option_1') }}</flux:select.option>
				<flux:select.option value="{{ __('form.type_option_2') }}">{{ __('form.type_option_2') }}</flux:select.option>
				<flux:select.option value="{{ __('form.type_option_3') }}">{{ __('form.type_option_3') }}</flux:select.option>
				<flux:select.option value="{{ __('form.type_option_4') }}">{{ __('form.type_option_4') }}</flux:select.option>
				<flux:select.option value="{{ __('form.type_option_5') }}">{{ __('form.type_option_5') }}</flux:select.option>
				<flux:select.option value="{{ __('form.type_option_6') }}">{{ __('form.type_option_6') }}</flux:select.option>
			</flux:select>

			<flux:input label="{{ __('form.date') }}" max="2999-12-31" type="date" />

			<flux:input label="{{ __('form.location') }}" />

			<flux:textarea label="{{ __('form.additional_info') }}" />

			<flux:field variant="inline">
				<flux:checkbox />
				<flux:label>@lang('form.terms')</flux:label>
				<flux:error name="terms" />
			</flux:field>

			<x-ui.spacer py type="sm">
				<h2 class="text-pretty">@lang('form.survey_title')</h2>

				<flux:radio.group>
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
