<x-app-layout>
    @section('content')
    <div style="padding:1em 3em;min-height: 100vh;background: linear-gradient(90deg, #FFFFFF -53.09%, #969798 9.67%, #969798 89.45%, #FFFFFF 157.64%);">
        <form action="/folders" method="post">
            @csrf
            <div style="margin-bottom: 1rem;">
                <a href="/folders" style="margin:auto 0;">
                    <svg class="feather" style="height: 24px;width: 24px;stroke: #F5F5F5;fill: none;stroke-width: 2px;margin: auto 0;display:inline-block">
                        <use href="/icons/feather-sprite.svg#chevron-left"/>
                    </svg>
                    <span style="color: #F5F5F5;font-size: 0.8rem;font-weight: bold;">Go Back</span>
                </a>
            </div>

            <div style="width:100%;min-height:6em;margin:1em 0;padding:1em 1.5em;background: #494949;border: 1px solid #889CAE;border-radius: 5px;">
                <div style="position: relative;margin: 0 1em;">
                    <input type="text" name="name" id="name" style="color: white;font-size: 1.4rem;background: none;border: none;border-bottom: 1px #D1D1D1 solid;padding-left: 3em;">
                    <label for="name" style="color: #D1D1D1;font-size: 0.8rem;position: absolute;left: 0.5em;bottom:0.5em;">Folder</label>
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
            </div>

            <div style="display: flex;justify-content: space-evenly;">
                <button style="color: white;font-size:0.8rem;font-weight: bold;background: linear-gradient(360deg, #889CAE -38.75%, rgba(146, 229, 255, 0) 232.5%);
                border: 0.5px solid #FFFFFF;
                filter: drop-shadow(0px 4px 4px rgba(0, 0, 0, 0.25));
                border-radius: 0.5em;padding: 0.75em;">Add Folder</button>
                <button style="color: white;font-size:0.8rem;font-weight: bold;background: linear-gradient(360deg, #FF1F00 -38.75%, rgba(166, 187, 228, 0.182292) 232.47%, #FF006B 232.5%);
                border: 0.5px solid #FFFFFF;
                box-shadow: 0px 4px 4px rgba(0, 0, 0, 0.25);
                border-radius: 0.5em;padding: 0.75em;">Cancel</button>
            </div>
        </form>
    </div>
    @endsection()
</x-app-layout>