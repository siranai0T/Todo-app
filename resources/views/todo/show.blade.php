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
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        詳細画面
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <tbody>
                                <tr>
                                    <th>id</th>
                                    <td>{{ $todo->id }}</td>
                                </tr>
                                <tr>
                                    <th>タイトル</th>
                                    <td>{{ $todo->todo_title }}</td>
                                </tr>
                                <tr>
                                    <th>内容</th>
                                    <td>{{ $todo->todo_content }}</td>
                                </tr>
                            </tbody>
                        </table>
                        <a href="{{ route('todos.index') }}">一覧へ</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
