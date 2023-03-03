<x-app-layout>
    @section('content')
    @include('layouts.toolbar-folders', ['folder_names' => $folders->pluck('name', 'slug')])

    <div style="padding:3em 4em;min-height: 100vh;background: linear-gradient(271.89deg, #E8E8E8 0%, #FFFFFF 47.92%, #E8E8E8 94.79%);">

        @forelse ($folders as $folder)
            <div style="display: flex;padding: 0.3em 1em;border-left: 3px #FF006B solid;">
                <a href="{{ $folder->path() }}" style="padding: 0 0.5em;">
                    <h1 style="font-size:21px;margin-right: auto;">{{ $folder->name }}</h1>
                </a>
                <svg class="feather" style="height: 24px;width: 24px;stroke: black;fill: none;stroke-width: 2px;margin: auto 0;">
                    <use href="/icons/feather-sprite.svg#chevron-down"/>
                </svg>
            </div>
            
            <div style="background-color: white;border-radius: 0.5em;padding: 1em 1em;margin: 0.5em 0;width: fit-content;min-width: 24em;">
                <div style="font-size: 16px;font-weight: bold;padding-left: 1em;padding-bottom: 0.5em;">Tasks</div>
                @foreach ($folder->tasks as $task)
                    <div style="display: flex;justify-content: space-between;border-top: 1px #D1D1D1 solid;border-bottom: 1px #D1D1D1 solid;padding: 0.5em;font-size: 16px;">
                        <div>
                            <svg class="feather" style="display: inline-block;height: 20px;width: 20px;stroke: {{ $task->completed ? '#FFC700' : '#FF006B'}};fill: none;stroke-width: 2px;margin: auto 0;">
                                <use href="/icons/feather-sprite.svg#{{ $task->completed ? 'check-circle' : 'circle'}}"/>
                            </svg>
                            <span style="padding-left: 0.5em;">
                                <a href="{{ $folder->path() }}">{{ $task->body }}</a>
                            </span>
                        </div>
                        <a href="#" style="padding: 0 0.5em;">
                            <svg class="feather" style="height: 18px;width: 18px;stroke: #D1D1D1;fill: none;stroke-width: 2px;margin: auto 0;">
                                <use href="/icons/feather-sprite.svg#more-vertical"/>
                            </svg>
                        </a>
                    </div>
                @endforeach
            </div>

            @forelse ($folder->notes as $note)
            <div style="background-color: white;border-radius: 0.5em;padding: 1em 3em;margin: 0.5em 0;min-width: 26em;width: fit-content;font-size: 14px;">
                <a href="{{ $folder->path() }}">
                    <span style="font-weight: bold;font-size: 18px;margin-right: 1em;">
                        {{$note->title}}
                    </span>
                    {{ substr($note->description, 0, 80) }} ...
                </a>
            </div>
            @empty
                <h3>No Notes yet.</h3>
            @endforelse
        @empty
            <h3>No Folders yet.</h3>
        @endforelse
        {{-- <div style="display: flex;padding: 0.3em 1em;border-left: 3px #FF006B solid;margin-left: 1.5em;">
            <h2 style="font-size:18px;margin-right: auto;">Sub-Folder 1 HARDCODED</h2>
            <svg class="feather" style="height: 24px;width: 24px;stroke: black;fill: none;stroke-width: 2px;margin: auto 0;">
                <use href="/icons/feather-sprite.svg#chevron-left"/>
            </svg>
        </div>

        <div style="display: flex;padding: 0.3em 1em;border-left: 3px #FF006B solid;margin-left: 3em;">
            <h3 style="font-size:16px;margin-right: auto;">Sub-Sub-Folder 1 HARDCODED</h3>
            <svg class="feather" style="height: 24px;width: 24px;stroke: black;fill: none;stroke-width: 2px;margin: auto 0;">
                <use href="/icons/feather-sprite.svg#chevron-left"/>
            </svg>
        </div> --}}

    </div>
    @endsection()
</x-app-layout>


