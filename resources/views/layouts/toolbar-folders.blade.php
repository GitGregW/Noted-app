<nav x-data="{ open: false }" style="background-color: #889CAE;position: sticky;top: 0;padding: 0.5em 1em;">
    <div class="toolbar">
        {{-- <div>
            <a href="" @click.prevent="$modal.show('hello-world')">Show Modal</a>
        </div> --}}
        <div style="height: 24px;">
            <x-dropdown align="left" width="48">
                <x-slot name="trigger" style="height: 24px;">
                    <button>
                        <svg class="feather" style="height: 24px;width: 24px;stroke: white;fill: none;stroke-width: 2px;">
                            <use href="/icons/feather-sprite.svg#edit"/>
                        </svg>
                    </button>
                </x-slot>
                <x-slot name="content">
                    @foreach ($folder_names as $path => $folder_name)
                        <x-dropdown-link :href="'/folders/' . $path . '/notes/create'">
                            {{ $folder_name }}
                        </x-dropdown-link>
                    @endforeach
                    <div id="app2">
                        <x-dropdown-link @click.prevent="show = true">
                            <form-modal-component></form-modal-component>
                        </x-dropdown-link>
                    </div>
                    
                </x-slot>
            </x-dropdown>
        </div>
        <div style="height: 24px;">
            <x-dropdown align="left" width="48">
                <x-slot name="trigger" style="height: 24px;">
                    <button>
                        <svg class="feather" style="height: 24px;width: 24px;stroke: white;fill: none;stroke-width: 2px;">
                            <use href="/icons/feather-sprite.svg#check-circle"/>
                        </svg>
                    </button>
                </x-slot>
                <x-slot name="content">
                    @foreach ($folder_names as $path => $folder_name)
                        <x-dropdown-link :href="'/folders/' . $path . '/tasks/create'">
                            {{ $folder_name }}
                        </x-dropdown-link>
                    @endforeach
                </x-slot>
            </x-dropdown>
        </div>
        <div style="height: 24px;">
            <x-dropdown align="left" width="48">
                <x-slot name="trigger" style="height: 24px;">
                    <button>
                        <svg class="feather" style="height: 24px;width: 24px;stroke: white;fill: none;stroke-width: 2px;">
                            <use href="/icons/feather-sprite.svg#folder-plus"/>
                        </svg>
                    </button>
                </x-slot>
                <x-slot name="content">
                    <x-dropdown-link :href="'/folders/create'">
                        New Folder
                    </x-dropdown-link>
                    <x-dropdown-link :href="'#'">
                        <b>Sub Folders TBA</b>
                    </x-dropdown-link>
                    {{-- @foreach ($folder_names as $path => $folder_name)
                        <x-dropdown-link :href="'/folders/' . $path . '/create'">
                            {{ $folder_name }}
                        </x-dropdown-link>
                    @endforeach --}}
                </x-slot>
            </x-dropdown>
        </div>
    </div>
</nav>