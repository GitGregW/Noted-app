<x-app-layout>
    @section('content')
    <div style="padding:1em 3em;min-height: 100vh;background: linear-gradient(271.89deg, #E8E8E8 0%, #FFFFFF 47.92%, #E8E8E8 94.79%);">
        
        <div style="margin-bottom: 1rem;">
            <a href="{{ route('notes') }}">
                <svg class="feather" style="height: 24px;width: 24px;stroke: #889CAE;fill: none;stroke-width: 2px;margin: auto 0;display:inline-block">
                    <use href="/icons/feather-sprite.svg#chevron-left"/>
                </svg>
                <span style="color: #889CAE;font-size: 0.8rem;font-weight: bold;">Go Back</span>
            </a>
        </div>

        <div style="display: flex;padding: 0.3em 1em;border-left: 3px #FF006B solid;">
            <h1 style="font-size:21px;margin-right: auto;">Folder 1 HARDCODED</h1>
            <svg class="feather" style="height: 24px;width: 24px;stroke: black;fill: none;stroke-width: 2px;margin: auto 0;">
                <use href="/icons/feather-sprite.svg#chevron-down"/>
            </svg>
        </div>

        <div style="background-color: white;border-radius: 0.5em;padding: 1em 1em;margin: 0.5em 0;width: fit-content;font-size: 14px;">
            <span style="font-weight: bold;font-size: 18px;margin-right: 1em;">{{ $note->title }}</span>
            <p>{{ $note->description }}</p>
            <div style="font-size: 0.8rem;color: #969798;margin-left: auto;margin-top: 0.8rem;width: fit-content;text-align: right;">
                Created: {{ $note->created_at->format("d/m/Y h:ia") }}<br />
                Modified: {{ $note->updated_at->format("d/m/Y h:ia") }}
            </div>
        </div>
    </div>
    @endsection()
</x-app-layout>


