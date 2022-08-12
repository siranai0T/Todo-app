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
        <div class="card">
            <div class="card-header">TODO一覧</div>
            <div class="card-body">
                <a href="{{ route('todos.create') }}" class="btn btn-success mb-3">新規登録</a>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">@sortablelink('id', 'ID')</th>
                            <th scope="col">@sortablelink('title', 'タイトル')</th>
                            <th scope="col">@sortablelink('content', '内容')</th>
                            <th scope="col">@sortablelink('deadline', '期限')</th>
                            <th scope="col">@sortablelink('status', '状態')</th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($todos as $todo)
                            <tr>
                                <td>{{ $todo->id }}</td>
                                <td>{{ $todo->title }}</td>
                                <td>{{ $todo->content }}</td>
                                <td>{{ $todo->deadline }}</td>
                                <td><span class="label {{ $todo->status_class }}">{{ $todo->status_label }}</span></td>
                                <td> <a href="{{ route('todos.show', $todo->id) }}" class="btn btn-primary mb-3">詳細</a>
                                </td>
                                <td> <a href="{{ route('todos.edit', $todo->id) }}" class="btn btn-info mb-3">編集</a>
                                <td>
                                    <form method="post" action="{{ route('todos.destroy', $todo->id) }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">削除</button>
                                    </form>
                                </td>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $todos->appends(request()->query())->links() }}
            </div>
        </div>
    </div>
</body>

</html>
