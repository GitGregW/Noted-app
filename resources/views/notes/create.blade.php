<x-app-layout>
    @section('content')
    <div class="section__background">
        
        <div class="form__container">
            <a href="{{ $folder->path() }}" class="form__link">
                <svg class="feather"><use href="/icons/feather-sprite.svg#chevron-left"/></svg>
                <span>Go Back</span>
            </a>
            <span>{{ $folder->name }}</span>
        </div>

        <form class="noted__form" action="{{ $folder->path() . '/notes' }}" method="post">
            @csrf
            <label for="title">Header
                <input type="text" name="title" id="title">
            </label>
            <label for="description" class="textarea__label">Note
                <textarea name="description" id="description" rows="5"></textarea>
            </label>

            @if ($errors->any())
                <div class="form__validation">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div style="margin: 0 2.5em 1em auto;">
                <a href="#">
                    <svg class="feather" style="stroke: #E8E8E8;">
                        <use href="/icons/feather-sprite.svg#trash-2"/>
                    </svg>
                </a>
            </div>
            <div class="button__wrapper">
                <x-primary-button style="background: linear-gradient(360deg, #889CAE -38.75%, rgba(146, 229, 255, 0) 232.5%);">Add Note</x-primary-button>
                <x-primary-button style="background: linear-gradient(360deg, #FF1F00 -38.75%, rgba(166, 187, 228, 0.182292) 232.47%, #FF006B 232.5%);">Cancel</x-primary-button>
            </div>
        </form>
    </div>
    @endsection()
</x-app-layout>