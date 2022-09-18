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
            <div class="card-header">新規登録</div>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="card-body">
                <form method="post" action="{{ route('todos.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="title" class="form-label">タイトル<span class="text-info">
                                *必須。20文字以内。</span></label>
                        <input type="text" name="title" class="form-control">
                        <label for="content" class="form-label">内容<span class="text-info"> *50文字以内。</span></label>
                        <input type="text" name="content" class="form-control">
                        <label for="deadline" class="form-label">期限 </label>
                        <input type="date" name="deadline" class="form-control">
                        <label for="completion_date" class="form-label">完了日 </label>
                        <input type="date" name="completion_date" class="form-control">
                        <label for="status" class="form-label">状態 </label>
                        <select class="form-control" id="status" name="status">
                            <option value="1">未着手</option>
                            <option value="2">進行中</option>
                            <option value="3">完了</option>
                            <option value="4">期限切れ</option>
                        </select>
                    </div>
            </div>
            <div>
                <button type="submit" class="btn btn-success">登録</button>
            </div>
            </form>
            <a href="{{ route('todos.index') }}">一覧へ</a>
        </div>
    </div>
    </div>
</body>

</html>
