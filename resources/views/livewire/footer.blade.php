<footer class="">

	<x-ui.spacer type="md">

		<div class="relative">
			<div class="lg:aspect-100/40 aspect-13/8 bg-[url(/public/img/konsultacje.jpg)] bg-cover bg-left bg-no-repeat lg:bg-[url(/public/img/konsultacje.jpg)] lg:bg-left">

			</div>

			<div class="right-15 bottom-5 max-lg:px-5 max-lg:py-5 lg:absolute">
				<x-ui.spacer pb>

					<div>
						<img src="/img/up_rect.svg" />
						<h1 class="text-pretty">@lang('texts.consultations_header')</h1>
					</div>

					<div class="prose prose-sm relative lg:max-w-[325px]">

						<p>@lang('texts.consultations')</p>
						</p>
						<img class="absolute -bottom-6 right-0 rotate-180" src="/img/up_rect.svg" />
					</div>

				</x-ui.spacer>

			</div>
		</div>

		<div class="grid gap-8 px-4 md:grid-cols-2">

			<x-ui.spacer type="md">

				<div class="flex flex-row items-baseline gap-x-1">
					<img src="/img/up_rect.svg" />
					<x-ui.spacer type="xs">

						<h2>{{ __('form.phone') }}</h2>
						<p>+48 538 543 307</br>
							+48 698 227 022</p>
					</x-ui.spacer>
				</div>

				<div class="flex flex-row items-baseline gap-x-1">
					<img src="/img/up_rect.svg" />

					<x-ui.spacer type="xs">

						<h2>Email</h2>
						<p><a href="mailto:office@artgarden.waw.pl">office@artgarden.waw.pl</a></p>
					</x-ui.spacer>
				</div>
				<div class="flex flex-row items-baseline gap-x-1">
					<img src="/img/up_rect.svg" />
					<x-ui.spacer type="xs">

						<h2>@lang('ui.hours_of_work')</h2>
						<p>@lang('ui.hours')
						</p>
					</x-ui.spacer>
				</div>

			</x-ui.spacer>
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
		</div>

	</x-ui.spacer>

	<x-ui.spacer class="mt-10 bg-green-950 text-white" pt type="md">

		<div class="grid grid-cols-2 border-y border-green-50 text-sm md:flex md:flex-row md:justify-around">

			<div class="flex justify-center md:basis-1/3">
				<div class="flex flex-col gap-y-5 py-10">
					<a href="{{ route('offer') }}" wire:navigate>@lang('ui.offer')</a>
					<a href="{{ route('works') }}" wire:navigate>@lang('ui.work')</a>
					<a href="{{ route('blog') }}" wire:navigate>@lang('ui.blog')</a>
					<a href="{{ route('contact') }}" wire:navigate>@lang('ui.contact')</a>
				</div>
			</div>

			<div class="flex justify-center border-l-[0.5px] border-green-50 md:basis-1/3">
				<div class="flex flex-col gap-y-5 py-10">
					<a href="{{ route('faq') }}" wire:navigate>@lang('ui.faq')</a>
					<a href="{{ route('privacy') }}" wire:navigate>@lang('ui.privacy')</a>
					<a href="{{ route('terms') }}" wire:navigate>@lang('ui.terms')</a>
					<a href="{{ route('cookies') }}" wire:navigate>@lang('ui.cookies')</a>

				</div>

			</div>
			<div class="flex justify-center border-green-50 max-md:border-t md:basis-1/3 md:border-l">
				<div class="flex flex-col gap-y-5 py-10">
					<a href="https://www.facebook.com/profile.php?id=100057178280718" target="_blank">Facebook</a>
					<a href="https://www.facebook.com/profile.php?id=100057178280718" target="_blank">Instagram</a>
					{{-- <a class="max-md:hidden" href="{{ route('contact') }}" wire:navigate>@lang('ui.contact')</a> --}}
					<a class="max-md:hidden" href="{{ route('download') }}">@lang('ui.download')</a>
					<div>
						<a class="{{ app()->getLocale() === 'pl' ? 'currents' : '' }}" href="{{ LaravelLocalization::getLocalizedURL('pl', null, [], true) }}">PL</a>
						&nbsp; / &nbsp;
						<a class="{{ app()->getLocale() === 'en' ? 'currents' : '' }}" href="{{ LaravelLocalization::getLocalizedURL('en', null, [], true) }}">EN</a>
					</div>
				</div>

			</div>

			<div class="flex justify-center border-l border-green-50 max-md:border-t md:hidden md:basis-1/3">
				<div class="flex flex-col gap-y-5 py-10">
					<a href="{{ route('index') }}" wire:navigate>@lang('ui.contact')</a>
					<a href="{{ route('index') }}" wire:navigate>@lang('ui.download')</a>

				</div>

			</div>

		</div>

		<img alt="Logo" class="w-full px-4 md:px-32" src="{{ asset('img/logo_white.svg') }}">
		{{-- <x-logo /> --}}
		<hr class="h-[0.5px] opacity-70">

	</x-ui.spacer>
	<div class="flex flex-row justify-between bg-green-950 p-4 text-xs text-white md:p-10">
		<div>by <a href="https://www.linkedin.com/in/joanna-dyczkowska-b3543850/" target="_blank">Joanna Dyczkowska</a></div>
		<div>© ArtGarden | 2025</div>
	</div>
</footer>
