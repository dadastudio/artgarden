<?php

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use App\Livewire\UploadPhoto;
use Livewire\Livewire;

test('can upload photo', function () {
	Storage::fake('avatars');

	$file = UploadedFile::fake()->image('avatar.png');

	Livewire::test(UploadPhoto::class)
		->set('photo', $file)
		->call('upload', 'uploaded-avatar.png');

	Storage::disk('avatars')->assertExists('uploaded-avatar.png');
});