<x-app-layout>
    @section('content')
    <div style="padding:3em 4em;background: linear-gradient(271.89deg, #E8E8E8 0%, #FFFFFF 47.92%, #E8E8E8 94.79%);">
        <div style="display: flex;padding: 0.3em 1em;border-left: 3px #FF006B solid;">
            <h1 style="font-size:21px;margin-right: auto;">Folder 1 HARDCODED</h1>
            <svg class="feather" style="height: 24px;width: 24px;stroke: black;fill: none;stroke-width: 2px;margin: auto 0;">
                <use href="/icons/feather-sprite.svg#chevron-down"/>
            </svg>
        </div>
        @forelse ($notes as $note)
        <div style="background-color: white;border-radius: 0.5em;padding: 1em 3em;margin: 0.5em 0;width: fit-content;font-size: 14px;">
            <a href="{{ $note->path() }}">
                <span style="font-weight: bold;font-size: 18px;margin-right: 1em;">
                    {{$note->title}}
                </span>
                {{ substr($note->description, 0, 80) }} ...
            </a>
        </div>
        @empty
            <h3>No Notes yet.</h3>
        @endforelse
        
        <div style="display: flex;padding: 0.3em 1em;border-left: 3px #FF006B solid;margin-left: 1.5em;">
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
        </div>
    </div>
    @endsection()
</x-app-layout>


