<div>
    <h1>Ciao {{$user->name}},</h1>
    <p>Ecco i tuoi ultimi commenti ai corsi UniGe</p>

    @foreach ($user->comments()->limit(3)->get() as $comment)
        <hr>
        <h3>{{ $comment->title }}</h3>
        <p>{{ $comment->text }}</p>
        <p style="color: #636b6f; font-size: .8rem">
            {{ $comment->updated_at->format('d/m/Y H:i') }}
        </p>
    @endforeach
</div>
