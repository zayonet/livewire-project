<div>
    {{-- Stop trying to control. --}}
    <p>{{ $content }}</p>
    <form method="post" wire:submit.prevent="create" >
        <div>
            <input name="content" id="content" wire:model="content" />
            @error('content') {{ $message }}

            @enderror
        </div>
        <button type="submit">Criar Tweet</button>
    </form>
    @foreach ($tweets as $tweet)
        {{ $tweet->user->name }} - {{ $tweet->content }}
        @if($tweet->likes->count())
            <a href="#" wire:click.prevent="unlike({{ $tweet->id }})">Discurtir</a>
        @else
            <a href="#" wire:click.prevent="like({{ $tweet->id }})">Curtir</a>
        @endif
        <br>
    @endforeach
    <hr>
    <div>
        {{ $tweets->links() }}
    </div>
</div>
