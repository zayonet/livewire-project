<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Tweet;
class ShowTweets extends Component
{
    use WithPagination;

    public $content = 'apenas um teste';

    protected $rules = [
        'content' => 'required|min:3|max:255'
    ];

    public function render()
    {

        $tweets = Tweet::with('user')->paginate(2);
        return view('livewire.show-tweets', [
            'tweets' => $tweets
        ]);
    }

    public function create()
    {
        //dd($this->content);
        $this->validate();
        Tweet::create([
            'content' => $this->content,
            'user_id' => 1
        ]);

        $this->content = '';
    }
}
