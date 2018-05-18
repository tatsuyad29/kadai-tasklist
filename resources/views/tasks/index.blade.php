@extends('layouts.app')

@section('content')

    <h1>タスク一覧</h1>
    @if (count($tasks) > 0)
        <ul>
            @foreach ($tasks as $task)
                @if ($task->status == 0)
                    <li>{!! link_to_route('tasks.show', $task->id, ['id' => $task->id]) !!} : task{{ $task->content }} > 未着手</li>
                @elseif ($task->status == 1)
                    <li>{!! link_to_route('tasks.show', $task->id, ['id' => $task->id]) !!} : task{{ $task->content }} > 実行中</li>
                @elseif ($task->status == 2)
                    <li>{!! link_to_route('tasks.show', $task->id, ['id' => $task->id]) !!} : task{{ $task->content }} > 完了</li>
                @else
                    <li>{!! link_to_route('tasks.show', $task->id, ['id' => $task->id]) !!} : task{{ $task->content }} > エラー</li>
                @endif
            @endforeach
        </ul>
    @endif
    
    {!! link_to_route('tasks.create', '新規タスクの投稿') !!}

@endsection