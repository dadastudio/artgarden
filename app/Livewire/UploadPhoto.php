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
		// $this->photo->storeAs('/', "newphoto", 'avatars');
		$this->photo->storeAs('/', 'avatar.jpg', 'avatars');

	}
	public function render()
	{
		return view('livewire.upload-photo');
	}
}
