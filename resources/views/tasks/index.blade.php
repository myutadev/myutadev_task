<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>タスク管理アプリ</title>
</head>

<body>
    <h1>タスク一覧</h1>
    @foreach ($tasks as $task)
        <div class="task-list">
            <a href="{{ route('tasks.show', $task) }}">{{ $task->title }}</a>
            <form action="{{ route('tasks.destroy', $task) }}" method="post" class="delete-button">
                @csrf
                @method('DELETE')
                <input type="submit" value="削除する">
            </form>
        </div>
    @endforeach

    <h1>新規タスク投稿</h1>
    @if ($errors->any())
        <div class="error">
            <p>
                <b>{{ count($errors) }}件のエラーがあります。</b>
            </p>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('tasks.store') }}" method="post">
        @csrf
        <p>
            <label for="title">タイトル</label><br>
            <input type="text" name="title" id="title" value="{{ old('title') }}">
        </p>
        <p>
            <label for="body">タスク内容</label><br>
            <textarea name="body" id="body">{{ old('body') }}</textarea>
        </p>
        <input type="submit" value="Create Task">
    </form>
</body>

</html>
