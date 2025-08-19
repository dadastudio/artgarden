<?php

use Livewire\Volt\Component;
use App\Models\Photo;

new class extends Component {
    public function with(): array
    {
        return [
            'heroImg' => Photo::find(104),
        ];
    }
}; ?>
<footer class="">

	<x-ui.spacer type="md">

		<x-hero :heroImg="$heroImg" :is_left="false" text="{!! __('consultations.text') !!}" title="{!! __('consultations.title') !!}" />

		<div class="grid gap-8 px-4 md:grid-cols-2">

			<x-ui.spacer type="md">

				<div class="flex flex-row items-baseline gap-x-1">
					<img src="/img/up_rect.svg" />
					<x-ui.spacer type="xs">

						<h2>{{ __('form.phone') }}</h2>

						@lang('contact.phones')
					</x-ui.spacer>
				</div>

				<div class="flex flex-row items-baseline gap-x-1">
					<img src="/img/up_rect.svg" />

					<x-ui.spacer class="" type="xs">

						<h2>Email</h2>
						<p><a class="transition-colors hover:text-green-700" href="mailto:{{ __('contact.email') }}">@lang('contact.email')</a></p>
					</x-ui.spacer>
				</div>
				<div class="flex flex-row items-baseline gap-x-1">
					<img src="/img/up_rect.svg" />
					<x-ui.spacer class="" type="xs">

						<h2>@lang('contact.hours_title')</h2>
						<p>@lang('contact.hours')
						</p>
					</x-ui.spacer>
				</div>

			</x-ui.spacer>
			<livewire:contactform />
		</div>

	</x-ui.spacer>

	<x-ui.spacer class="mt-10 bg-green-950 text-white" pt type="md">

		<div class="grid grid-cols-2 border-y border-green-50 text-sm md:flex md:flex-row md:justify-around">

			<div class="flex pl-5 md:basis-1/3 md:pl-10 lg:pl-12 xl:pl-32">
				<div class="flex flex-col gap-y-5 py-10">
					<a href="{{ route('offer') }}" wire:navigate>@lang('ui.offer')</a>
					<a href="{{ route('works') }}" wire:navigate>@lang('ui.work')</a>
					<a href="{{ route('blog') }}" wire:navigate>@lang('ui.blog')</a>
					<a href="{{ route('contact') }}" wire:navigate>@lang('ui.contact')</a>
				</div>
			</div>

			<div class="border-l-1 xl- flex border-green-50 pl-5 md:basis-1/3 md:pl-10 lg:pl-12">
				<div class="flex flex-col gap-y-5 py-10">

					<a href="{{ route('faq') }}" wire:navigate>@lang('ui.faq')</a>
					<a href="{{ route('privacy') }}" wire:navigate>@lang('ui.privacy')</a>
					<a href="{{ route('terms') }}" wire:navigate>@lang('ui.terms')</a>
					<a href="{{ route('cookies') }}" wire:navigate>@lang('ui.cookies')</a>

				</div>

			</div>

			<div class="xl- flex border-green-50 pl-5 max-md:border-t md:basis-1/3 md:border-l md:pl-10 lg:pl-12">
				<div class="flex flex-col gap-y-5 py-10">
					<a href="https://www.facebook.com/profile.php?id=100057178280718" target="_blank">Facebook</a>
					<a href="https://www.facebook.com/profile.php?id=100057178280718" target="_blank">Instagram</a>
					<a class="max-md:hidden" href="{{ route('download') }}">@lang('ui.download')</a>

					<livewire:langswitcher :isMenu="false" />

				</div>

			</div>

			<div class="xl- flex border-l border-green-50 pl-5 max-md:border-t md:hidden md:basis-1/3 md:pl-10 lg:pl-12">
				<div class="flex flex-col gap-y-5 py-10">
					<a href="{{ route('index') }}" wire:navigate>@lang('ui.contact')</a>
					<a href="{{ route('index') }}" wire:navigate>@lang('ui.download')</a>

				</div>

			</div>

		</div>

		<img alt="Logo" class="w-full px-10 md:px-32" src="{{ asset('img/logo_white.svg') }}">
		<hr class="h-[0.5px] opacity-70">

	</x-ui.spacer>
	<div class="flex flex-row justify-between bg-green-950 p-4 text-xs text-white md:p-10">
		<div>by <a href="https://www.linkedin.com/in/joanna-dyczkowska-b3543850/" target="_blank">Joanna Dyczkowska</a></div>
		<div>© ArtGarden | 2025</div>
	</div>
</footer>
