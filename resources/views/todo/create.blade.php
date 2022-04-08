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
            <div class="card-header">新規登録</div>
            <div class="card-body">
                <form method="POST" action="{{ url('/todos') }}">
                    @csrf
                    <div class="form-group">
                        <input type="text" name="task_title" class="form-control">
                        <input type="text" name="task_content" class="form-control">
                    </div>
                    <div>
                        <button type="submit" class="btn btn-success">登録</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>

</html>
