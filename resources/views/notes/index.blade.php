@forelse ($notes as $note)
    <h3>
        <a href="{{ $note->path() }}">{{$note->title}}</a>
    </h3>
@empty
    <h3>No Notes yet.</h3>
@endforelse