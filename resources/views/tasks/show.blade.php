<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <title>タスク詳細</title>
</head>

<body>
    <h1>タスク詳細</h1>
    <p>[タイトル]</p>
    <p>{{ $task->title }}</p>
    <p>[本文]</p>
    <p>{{ $task->body }}</p>

    <div class="button-area">
        <button type="button" onclick="location.href='{{ route('tasks.index') }}'">一覧へ戻る</button>
        <button type="button" onclick="location.href='{{ route('tasks.edit', $task) }}'">編集</button>
        <form action="{{ route('tasks.destroy', $task) }}" method="post">
            @csrf
            @method('DELETE')
            <input type="submit" value="削除">
        </form>
    </div>

</body>

</html>
