
<nav x-data="{ open: false }" style="background-color: #889CAE;position: sticky;top: 0;padding: 0.5em 1em;">
    <div style="display:flex;gap: 2em;">
        @if (request()->routeIs('folders.index'))
            {{-- List folder names --}}
        @endif
        <a href="/{{ request()->path() }}/notes/create" style="margin: auto 0;">
            <svg class="feather" style="height: 24px;width: 24px;stroke: white;fill: none;stroke-width: 2px;">
                <use href="/icons/feather-sprite.svg#edit"/>
            </svg>
        </a>
        <a href="/{{ request()->path() }}/tasks/create" style="margin: auto 0;">
            <svg class="feather" style="height: 24px;width: 24px;stroke: white;fill: none;stroke-width: 2px;">
                <use href="/icons/feather-sprite.svg#check-circle"/>
            </svg>
        </a>
        {{-- <a href="/folders/create" style="margin: auto 0;">
            <svg class="feather" style="height: 24px;width: 24px;stroke: white;fill: none;stroke-width: 2px;">
                <use href="/icons/feather-sprite.svg#folder-plus"/>
            </svg>
        </a> --}}
    </div>
</nav>