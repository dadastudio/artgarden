<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;

class UploadPhoto extends Component
{
	use WithFileUploads;

	public $photo;

	public function upload($name)
	{
		$this->photo->storeAs('/', $name, 'avatars');
	}
	public function render()
	{
		return view('livewire.upload-photo');
	}
}
