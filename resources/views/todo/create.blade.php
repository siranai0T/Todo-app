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
            <div class="card-body">
                <form method="post" action="{{ route('todos.store') }}">
                    @csrf
                    <div class="form-group">
                        <label for="title" class="form-label">タイトル</label>
                        <input type="text" name="title" class="form-control">
                        <label for="content" class="form-label">内容</label>
                        <input type="text" name="content" class="form-control">
                        <label for="deadline" class="form-label">期限 </label>
                        <input type="date" name="deadline" class="form-control">
                        <label for="status_id" class="form-label">状態 </label>
                        <input type="number" name="status_id" class="form-control">
                        {{-- <select class="form-control" id="status_id" name="status_id">
                            <option value="1">未着手</option>
                            <option value="2">進行中</option>
                            <option value="3">完了</option>
                            <option value="4">期限切れ</option>
                        </select> --}}
                        {{-- <div class="form-group">
                            <label for="status-id" class="form-label">状態 </label>
                            <select class="form-control" id="status-id" name="status_id">
                                @foreach ($statuses as $status)
                                    <option value="{{ $status->status_id }}">{{ $status->status_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div> --}}

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
