<?php

namespace App\Http\Livewire\User;

use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Support\Str;
use  App\Models\User;
use App\Models\Tweet;
class UploadPhoto extends Component
{
    use WithFileUploads;
    public $photo;

    public function render()
    {
        return view('livewire.user.upload-photo');
    }

    public function storagePhoto()
    {
        $this->validate([
            'photo'=>'required|image|max:1024'
        ]);
            $user = auth()->user();
        $nameFile = Str::slug(auth()->user()->name). '.'. $this->photo->getClientOriginalExtension(); //retorna o arquivo com com trasso
        $path = $this->photo->storeAs('users', $nameFile); //storeAs - Ajuda a de nome no ficheiro

        if($path){
            $user->update([
                'profile_photo_path' => $path
            ]);
        }
        return redirect()->route('tweets.index');
    }
}
