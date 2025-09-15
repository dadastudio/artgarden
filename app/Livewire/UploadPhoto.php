<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

class UploadPhoto extends Component
{
	use WithFileUploads;

	public $photo;

	public function save()
	{
		// Alternative approach for shared hosting compatibility
		$this->photo->storeAs('/', 'avatar.jpg', ['disk' => 'avatars']);

	}
	public function render()
	{
		return view('livewire.upload-photo');
	}
}
