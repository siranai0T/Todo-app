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
            <div class="card-header">
                編集画面
            </div>
            <div class="card-body">
                <form method="post" action="{{ route('todos.update', $todo->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="id" class="form-label">ID</label>
                        <div>{{ $todo->id }}</div>
                    </div>
                    <div class="form-group">
                        <label for="title" class="form-label">タイトル</label>
                        <input type="text" name="title" class="form-control" value="{{ $todo->title }}">
                        <label for="content" class="form-label">内容</label>
                        <input type="text" name="content" class="form-control" value="{{ $todo->content }}">
                        <label for="deadline" class="form-label">期限 </label>
                        <input type="date" name="deadline" class="form-control" value="{{ $todo->deadline }}">
                        <label for="completion_date" class="form-label">完了日 </label>
                        <input type="date" name="completion_date" class="form-control" value="{{ $todo->completion_date }}">
                        <label for="status" class="form-label">状態 </label>
                        <select name="status" id="status" class="form-control">
                            @foreach (\App\Models\Todo::STATUS as $key => $val)
                                <option value="{{ $key }}"
                                    {{ $key == old('status', $todo->status) ? 'selected' : '' }}>
                                    {{ $val['label'] }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <button type="submit" class="btn btn-success">更新</button>
                    </div>
                </form>
                <a href="{{ route('todos.index') }}">一覧へ</a>
            </div>
        </div>
    </div>
</body>

</html>
