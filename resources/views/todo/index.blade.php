<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Todo</title>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}"></script>
</head>

<body>
    <div class="container">
        <h3 class="my-3">TODOアプリ</h3>
        <div class="card mb-3">
            <div class="card-header">TODO一覧</div>
            <div class="card-body">
                <a href="{{ route('todos.create') }}" class="btn btn-success mb-3">新規登録</a>
                <table class="table">
                    <thead>
                        <tr>
                            <th>id</th>
                            <th>タイトル</th>
                            <th>内容</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($todos as $todo)
                            <tr>
                                <td>{{ $todo->id }}</td>
                                <td>{{ $todo->todo_title }}</td>
                                <td>{{ $todo->todo_content }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

</html>
