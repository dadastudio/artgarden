<?php

use Livewire\Volt\Component;

new class extends Component {
    public function rendering(\Illuminate\View\View $view): void
    {
        // seo()->title('Capitalics Warsaw Type Foundry', template: false);
    }
}; ?>
<x-ui.spacer class="lg:-mt-42 -mt-34" pb type="md">

	<div class="relative">
		<div class="lg:aspect-100/55 aspect-9/10 bg-[url(/public/img/Hero-mobile.webp)] bg-cover bg-bottom bg-no-repeat lg:bg-[url(/public/img/faq.jpg)] lg:bg-right">

		</div>

		<div class="bottom-5 left-10 max-lg:px-5 max-lg:py-5 lg:absolute">
			<x-ui.spacer>

				<div>
					<img src="/img/up_rect.svg" />
					<h1 class="text-pretty">@lang('texts.faq_header')</h1>
				</div>

				<div class="prose prose-sm relative lg:max-w-[325px]">
					<p>@lang('texts.faq_text')</p>
					<img class="absolute -bottom-6 right-0 rotate-180" src="/img/up_rect.svg" />
				</div>

			</x-ui.spacer>

		</div>
	</div>

	<div class="prose prose-sm mx-auto">
		<h2>Frequently Asked Questions</h2>

		<dl>
			<dt>How long does it take to prepare a bouquet?</dt>
			<dd>It depends on the quantity of flowers ordered. We usually prepare a bouquet within 24 hours.</dd>

			<dt>What is the delivery time?</dt>
			<dd>Delivery time is usually within 24 hours after the order is confirmed. For larger orders, we may need an additional day or two.</dd>

			<dt>Can you prepare custom bouquets?</dt>
			<dd>Yes, we can prepare custom bouquets for events and special occasions. Please contact us for more details.</dd>

			<dt>What is the cost of making a bouquet?</dt>
			<dd>The cost of making a bouquet depends on the quantity of flowers, their quality, and the size of the bouquet. We will provide you with a detailed quote before the order is confirmed.</dd>

			<dt>Can you deliver bouquets to any location?</dt>
			<dd>Yes, we can deliver bouquets to any location in the city of Warsaw. Please let us know the address and we will provide you with an estimate of the delivery costs.</dd>

			<dt>What is the minimum order?</dt>
			<dd>The minimum order is 100 flowers. If the order is less than 100 flowers, we may need to adjust the price or delivery time.</dd>

			<dt>Do you offer discounts for bulk orders?</dt>
			<dd>Yes, we offer discounts for bulk orders. Please contact us for more details.</dd>
		</dl>
	</div>
</x-ui.spacer>
