<div>
    <form method="post" wire:submit.prevent="storagePhoto">
        @if($photo)
            <img src="{{ $photo->temporaryUrl() }}" alt="" class="rounded-full  h-8 w-8">
        @endif
        <input type="file" wire:model="photo">
        @error('photo') {{ $message }}@enderror
        <button type="submit">carregar foto</button>
    </form>
</div>
