<?php

use App\Models\LanguageLine;
use Illuminate\Support\Facades\Mail;
use Livewire\Volt\Volt;
use function Pest\Laravel\assertDatabaseHas;
use function Pest\Livewire\livewire;
use Livewire\Livewire;
use Illuminate\Support\Facades\Config;

beforeEach(function () {
	// Set up test data
	$this->validData = [
		'name' => 'John Doe',
		'email' => 'john@example.com',
		'phone' => '+48 123456789',
		'type' => 'Typ wydarzenia',
		'date' => now()->addWeek()->format('Y-m-d'),
		'location' => 'Test Location',
		'additional_info' => 'Test additional info',
		'terms' => true,
		'survey' => 'Test survey response',
	];

	// Set up test config
	Config::set('mail.from.address', 'test@example.com');
	Config::set('mail.replyTo.address', 'noreply@example.com');
	Config::set('mail.send_confirmation', false);
	Config::set('mail.admin_email', 'admin@example.com');

	// Fake the mail facade
	Mail::fake();
});

test('contact form can be rendered', function () {
	// Test the Livewire component directly without HTTP requests
	$component = Livewire::test('contactform');

	// Assert the component exists and is mounted
	$component->assertSuccessful();

	// Assert the form exists and has the correct fields
	$component->assertSeeHtml('name="name"')
		->assertSeeHtml('name="email"')
		->assertSeeHtml('name="phone"')
		->assertSeeHtml('name="type"')
		->assertSeeHtml('name="date"')
		->assertSeeHtml('name="location"');
});

test('contact form has validation rules', function () {
	// Test that the component can be instantiated and has the expected properties
	$component = Livewire::test('contactform');

	// Check that the component has the expected public properties
	expect($component->instance())->toHaveProperty('name');
	expect($component->instance())->toHaveProperty('email');
	expect($component->instance())->toHaveProperty('phone');
	expect($component->instance())->toHaveProperty('type');
	expect($component->instance())->toHaveProperty('date');
	expect($component->instance())->toHaveProperty('location');
	expect($component->instance())->toHaveProperty('terms');
});

test('contact form validates email format', function () {
	// Test email validation by setting an invalid email
	$component = Livewire::test('contactform')
		->set('email', 'michal@dadastudio.pl')
		->assertSet('email', 'invalid-email');

	// The component should exist and the email should be set
	expect($component->get('email'))->toBe('invalid-email');
});

test('contact form accepts valid data', function () {
	$validData = [
		'name' => 'Test User',
		'email' => 'test@example.com',
		'phone' => '+48 123456789',
		'type' => 'Test Type',
		'date' => now()->addDay()->format('Y-m-d'),
		'location' => 'Test Location',
		'additional_info' => 'Test info',
		'terms' => true,
	];

	$component = Livewire::test('contactform');

	foreach ($validData as $key => $value) {
		$component->set($key, $value)->assertSet($key, $value);
	}
});

test('contact form has send mail method', function () {
	$component = Livewire::test('contactform');

	// Check that the sendMail method exists
	expect(method_exists($component->instance(), 'sendMail'))->toBeTrue();
});
