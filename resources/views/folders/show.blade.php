<x-app-layout>
    @section('content')
    @include('layouts.toolbar-folder')
    <div class="folder__background">
        
        <div class="back">
            <a href="/folders">
                <svg class="feather back__icon">
                    <use href="/icons/feather-sprite.svg#chevron-left"/>
                </svg>
                <span class="back__body">Go Back</span>
            </a>
        </div>

        <div class="folder__item--show">
            <h1 class="folder__header">{{ $folder->name }}</h1>
        </div>

        {{-- @include('tasks.show', ["tasks" => $folder->tasks, "folder_path" => $folder->path()]) --}}
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
                                    <use href="/icons/feather-sprite.svg#more-vertical"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
        @if($folder->notes->count())
            <div class="notes" style="margin-top: 1em;">
            @foreach ($folder->notes as $note)
                <a href="{{ $folder->path() . '/notes/' . $note->id . '/edit'  }}">
                    <div class="note note--show">
                        <span class="note__header">{{ $note->title }}</span>
                        <p>{{ $note->description }}</p>
                        <div class="note__timestamp">
                            Created: {{ $note->created_at->format("d/m/Y h:ia") }}<br />
                            Modified: {{ $note->updated_at->format("d/m/Y h:ia") }}
                        </div>
                    </div>
                </a>
            @endforeach
            </div>
        @endif
    </div>
    @endsection()
</x-app-layout>