<x-app-layout>
    @section('content')
    {{-- @include('layouts.toolbar-folders', ['folder_names' => $folders->pluck('name', 'slug')]) --}}

    @php
        $folder_names = $folders->pluck('name', 'slug');
    @endphp
    <toolbar-component>
        <toolbar-menu-component icon="edit" folder-names="{{$folder_names}}"></toolbar-menu-component>
        <toolbar-menu-component icon="check-circle" folder-names="{{$folder_names}}"></toolbar-menu-component>
        <form-modal-component type="Folder">
            <svg class="feather" style="height: 24px;width: 24px;stroke: white;fill: none;stroke-width: 2px;">
                <title>Folder</title>
                <use href="{{ asset('/icons/feather-sprite.svg#folder-plus') }}"/>
            </svg>
        </form-modal-component>
    </toolbar-component>

    {{-- <div id="toolbar">
    </div> --}}

    <div class="folder__background">        
        @forelse ($folders as $folder)
            <div class="folder">
                <svg class="folder__dropdown">
                    <use href="{{ asset('/icons/feather-sprite.svg#chevron-down') }}"/>
                </svg>
                <a href="{{ $folder->path() }}" class="folder__header">
                    <h1>{{ $folder->name }}</h1>
                </a>
            </div>
            <div class="folder__item">
            @if($folder->tasks->count())
                <div class="tasks">
                    <div class="task__header">Tasks</div>
                    @foreach ($folder->tasks as $task)
                        @php
                            $prev_date = '';
                            $due_date = new DateTime($task->due_date);
                            if($prev_date != $due_date->format('Ymd')){
                                $show_date = true;
                                $prev_date = $due_date->format('Ymd');
                                $now = new DateTime(date("Y-m-d H:i:s",strtotime("now")));
                                $interval = $now->diff($due_date);
                            }
                            else $show_date = false;
                        @endphp
                        <div class="task">
                            @if ($show_date)
                                <div>
                                    <a href="#" title="{{$interval->format('%R%a days')}}" style="color:#FF006B;font-style: italic;font-weight: bold;font-size: 12px;">{{ $due_date->format('D j/n') }}</a>
                                </div>
                            @endif
                            <div class="task__item">
                                <form action="{{ $folder->path() . "/tasks/" . $task->id . "/complete" }}" method="post">
                                    @csrf
                                    <button class="task__item" type="submit" style="padding: 0.5em;">
                                        <svg class="feather" class="task__item__complete" style="stroke: {{ $task->completed ? '#FFC700' : '#FF006B'}};">
                                            <use href="/icons/feather-sprite.svg#{{ $task->completed ? 'check-circle' : 'circle'}}"/>
                                        </svg>
                                        <div class="task__item__description">
                                            {{ $task->body }}
                                        </div>
                                    </button>
                                </form>
                                <a href="#" style="padding: 0.5em;margin: auto 0;">
                                    <svg class="task__item__actions">
                                        <use href="{{ asset('/icons/feather-sprite.svg#more-vertical') }}"/>
                                    </svg>
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
                @endif
                @if($folder->notes->count())
                <div class="notes">
                        @foreach ($folder->notes as $note)
                        {{-- border: solid lightgoldenrodyellow; --}}
                            <div class="note">
                                <a href="{{ $folder->path() }}">
                                    <span class="note__header">
                                        {{$note->title}}
                                    </span>
                                    {{ substr($note->description, 0, 80) }} ...
                                </a>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        @empty
            <h3>Get started - Create a folder</h3>
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


