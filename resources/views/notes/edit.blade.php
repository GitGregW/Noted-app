<x-app-layout>
    @section('content')
    <div style="padding:1em 3em;min-height: 100vh;background: linear-gradient(90deg, #FFFFFF -53.09%, #969798 9.67%, #969798 89.45%, #FFFFFF 157.64%);">
        <form action="{{ $folder->path() . '/notes/' . $note->id }}" method="post">
            @csrf
            @method('PATCH')
            <div style="margin-bottom: 1rem;display:flex;justify-content: space-between;">
                <a href="{{ $folder->path() }}" style="margin:auto 0;">
                    <svg class="feather" style="height: 24px;width: 24px;stroke: #F5F5F5;fill: none;stroke-width: 2px;margin: auto 0;display:inline-block">
                        <use href="/icons/feather-sprite.svg#chevron-left"/>
                    </svg>
                    <span style="color: #F5F5F5;font-size: 0.8rem;font-weight: bold;">Go Back</span>
                </a>
                <div style="position: relative;margin: 0 1em;">
                    <input type="text" name="folder" id="folder" value="{{ $folder->name }}" style="width: 100%;color: white;font-size: 1.2rem;background: none;border: none;border-bottom: 1px #D1D1D1 solid;padding-left: 3em;" disabled>
                    <label for="folder" style="color: #D1D1D1;font-size: 0.8rem;position: absolute;left: 0.5em;bottom:0.5em;">Folder</label>
                </div>
            </div>

            <div style="width:100%;min-height:18em;margin:1em 0;padding:1em 1.5em;background: #494949;border: 1px solid #889CAE;border-radius: 5px;">
                <div style="position: relative;margin: 0 1em;">
                    <input type="text" name="title" id="title" value="{{ $note->title }}" style="color: white;font-size: 1.4rem;background: none;border: none;border-bottom: 1px #D1D1D1 solid;padding-left: 3em;">
                    <label for="title" style="color: #D1D1D1;font-size: 0.8rem;position: absolute;left: 0.5em;bottom:0.5em;">Header</label>
                </div>
                <div style="position: relative;margin: 1.5em 0;">
                    <textarea name="description" id="description" rows="5" style="width:100%;color: white;font-size: 1.2rem;background: none;border: 1px #D1D1D1 solid;padding: 0.8em;padding-left: 0.25em;">
                        {{ $note->description }}
                    </textarea>
                    <label for="description" style="color: #D1D1D1;font-size: 0.8rem;position: absolute;right: 0.5em;top:0;">Note</label>
                </div>

                @if ($errors->any())
                    <div style="font-size:0.8em;color: red;">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Trash is for edit. -->
                {{-- <div style="margin: 0 2.5em 1em auto;">
                    <a href="{{ route('notes') }}">
                        <svg class="feather" style="height: 24px;width: 24px;stroke: #E8E8E8;fill: none;stroke-width: 2px;margin: auto 0;display:inline-block">
                            <use href="/icons/feather-sprite.svg#trash-2"/>
                        </svg>
                    </a>
                </div> --}}
            </div>

            <div style="display: flex;justify-content: space-evenly;">
                <button style="color: white;font-size:0.8rem;font-weight: bold;background: linear-gradient(360deg, #889CAE -38.75%, rgba(146, 229, 255, 0) 232.5%);
                border: 0.5px solid #FFFFFF;
                filter: drop-shadow(0px 4px 4px rgba(0, 0, 0, 0.25));
                border-radius: 0.5em;padding: 0.75em;">Update Note</button>
                <button style="color: white;font-size:0.8rem;font-weight: bold;background: linear-gradient(360deg, #FF1F00 -38.75%, rgba(166, 187, 228, 0.182292) 232.47%, #FF006B 232.5%);
                border: 0.5px solid #FFFFFF;
                box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
                border-radius: 0.5em;padding: 0.75em;">Cancel</button>
            </div>
        </form>
    </div>
    @endsection()
</x-app-layout>