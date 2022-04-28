<div>
    {{-- Stop trying to control. --}}
    <div class="container">
        <form method="post" wire:submit.prevent="create" >
            <div>
                <textarea name="content" id="content" wire:model="content" cols="30" rows="10"></textarea>
                @error('content') {{ $message }}

                @enderror
            </div>
            <button type="submit">Criar Tweet</button>
        </form>
        @foreach ($tweets as $tweet)
            <div class="flex">
                <div class="w-2/8">
                    @if($tweet->user->photo)
                        <img src="{{ url("storage/{$tweet->user->photo}") }}" alt="{{ $tweet->user->name }}" class="rounded-full  h-8 w-8">
                    @else
                        <img src="{{ url('images/no-image.svg') }}" alt="{{ $tweet->user->name }}" class="rounded-full  h-8 w-8">
                    @endif
                    {{ $tweet->user->name }}
                </div>
                <div  class="w-6/8">
                    {{ $tweet->content }}
                    @if($tweet->likes->count())
                        <a href="#" wire:click.prevent="unlike({{ $tweet->id }})">Discurtir</a>
                    @else
                        <a href="#" wire:click.prevent="like({{ $tweet->id }})">Curtir</a>
                    @endif
                </div>
            </div>
            <br>
        @endforeach
        <hr>
        <div>
            {{ $tweets->links() }}
        </div>
    </div>
</div>
