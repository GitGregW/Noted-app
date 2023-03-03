<x-app-layout>
    @section('content')
    @include('layouts.toolbar-folder')
    <div style="padding:1em 3em;min-height: 100vh;background: linear-gradient(271.89deg, #E8E8E8 0%, #FFFFFF 47.92%, #E8E8E8 94.79%);">
        
        <div style="margin-bottom: 1rem;">
            <a href="/folders">
                <svg class="feather" style="height: 24px;width: 24px;stroke: #889CAE;fill: none;stroke-width: 2px;margin: auto 0;display:inline-block">
                    <use href="/icons/feather-sprite.svg#chevron-left"/>
                </svg>
                <span style="color: #889CAE;font-size: 0.8rem;font-weight: bold;">Go Back</span>
            </a>
        </div>

        <div style="padding: 0.3em 1em;border-left: 3px #FF006B solid;">
            <h1 style="font-size:21px;margin-right: auto;">{{ $folder->name }}</h1>
        </div>

        {{-- @include('tasks.show', ["tasks" => $folder->tasks, "folder_path" => $folder->path()]) --}}
        @if ($folder->tasks)
            <div style="background-color: white;border-radius: 0.5em;padding: 1em 1em;margin: 0.5em 0;width: fit-content;min-width: 24em;">
                <div style="font-size: 16px;font-weight: bold;padding-left: 1em;padding-bottom: 0.5em;">Tasks</div>
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
                    <div style="{{ $show_date ? 'border-top: 1px #D1D1D1 solid;margin-top: 0.5em;' : '' }} {{ $loop->last ? 'border-bottom: 1px #D1D1D1 solid;' : '' }} 'padding: 0 0.5em;'">
                        @if ($show_date)
                        <div>
                            <a href="#" title="{{$interval->format('%R%a days')}}" style="color:#FF006B;font-style: italic;font-weight: bold;font-size: 12px;">{{ $due_date->format('D j/n') }}</a>
                        </div>
                        @endif
                        <div style="display: flex;justify-content: space-between;gap: 0.5em;">
                            <form action="{{ $folder->path() . "/tasks/" . $task->id . "/complete" }}" method="post">
                                @csrf
                                <button type="submit" style="padding: 0.5em;">
                                    <svg class="feather" style="display: inline-block;height: 20px;width: 20px;stroke: {{ $task->completed ? '#FFC700' : '#FF006B'}};fill: none;stroke-width: 2px;margin: auto 0;">
                                        <use href="/icons/feather-sprite.svg#{{ $task->completed ? 'check-circle' : 'circle'}}"/>
                                    </svg>
                                    <div style="display:inline;padding-left: 0.5em;font-size: 16px;line-height: 1em;">
                                        {{ $task->body }}
                                    </div>
                                </button>
                            </form>
                            <a href="#" style="padding: 0.5em;">
                                <svg class="feather" style="height: 18px;width: 18px;stroke: #D1D1D1;fill: none;stroke-width: 2px;margin: auto 0;">
                                    <use href="/icons/feather-sprite.svg#more-vertical"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif

        @forelse ($folder->notes as $note)
            <a href="{{ $folder->path() . '/notes/' . $note->id . '/edit'  }}">
                <div style="background-color: white;border-radius: 0.5em;padding: 1em 1em;margin: 0.5em 0;width: fit-content;font-size: 14px;">
                    <span style="font-weight: bold;font-size: 18px;margin-right: 1em;">{{ $note->title }}</span>
                    <p>{{ $note->description }}</p>
                    <div style="font-size: 0.8rem;color: #969798;margin-left: auto;margin-top: 0.8rem;width: fit-content;text-align: right;">
                        Created: {{ $note->created_at->format("d/m/Y h:ia") }}<br />
                        Modified: {{ $note->updated_at->format("d/m/Y h:ia") }}
                    </div>
                </div>
            </a>
        @empty
            <p>No notes yet.</p>
        @endforelse
    </div>
    @endsection()
</x-app-layout>