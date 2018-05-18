@extends('layouts.app')

@section('content')

    <h1>id = {{ $task->id }} のタスク詳細ページ</h1>
    
    <p>{{ $task->content }}</p>
    @if ($task->status == 0)
        <p>未着手</p>
    @elseif ($task->status == 1)
        <p>実行中</p>
    @elseif ($task->status == 2)
        <p>完了</p>
    @else   
        <p>エラー</p>
    @endif
    
    {!! link_to_route('tasks.edit', 'このタスクを編集', ['id' => $task->id]) !!}
    {!! Form::model($task, ['route' => ['tasks.destroy', $task->id], 'method' => 'delete']) !!}
        {!! Form::submit('削除') !!}
    {!! Form::close() !!}

@endsection