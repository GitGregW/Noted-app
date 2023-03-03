<x-app-layout>
    @section('content')
    <div style="padding:3em 4em;min-height: 100vh;background: linear-gradient(271.89deg, #E8E8E8 0%, #FFFFFF 47.92%, #E8E8E8 94.79%);">
        @foreach ($tasks as $task)
        <div style="background-color: white;border-radius: 0.5em;padding: 1em 3em;margin: 0.5em 0;min-width: 26em;width: fit-content;font-size: 14px;">
            <a href="{{ $task->path() }}">{{ $task->body }}</a>
        </div>
        @endforeach
    </div>
    @endsection()
</x-app-layout>


