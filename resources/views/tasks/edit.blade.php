<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <title>タスク編集</title>
</head>

<body>
    <h1>タスク編集</h1>

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

    <form action="{{ route('tasks.update', $task) }}" method="post">
        @csrf
        @method('PATCH')
        <p>
            <label for="title">タイトル</label><br>
            <input type="text" name="title" id="title" value="{{ old('title', $task->title) }}">
        </p>
        <p>
            <label for="body">タスク内容</label><br>
            <textarea name="body" id="body">{{ old('body', $task->body) }}</textarea>
        </p>
        <div class="button-area">
            <input type="submit" value="更新">
            <button type="button" onclick="location.href='{{ route('tasks.show', $task) }}'">詳細へ戻る</button>
        </div>
    </form>

</body>

</html>
