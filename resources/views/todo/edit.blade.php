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
                <form method="post" action="{{ route('todos.update', $todo->id) }}">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="id" class="form-label">ID</label>
                        <div>{{ $todo->id }}</div>
                    </div>
                    <div class="form-group">
                        <label for="title" class="form-label">タイトル<span class="text-info">
                                *必須。20文字以内。</span></label>
                        <input type="text" name="title" class="form-control" value="{{ $todo->title }}">
                        <label for="content" class="form-label">内容<span class="text-info">
                                *50文字以内。</span></label>
                        <input type="text" name="content" class="form-control" value="{{ $todo->content }}">
                        <label for="deadline" class="form-label">期限 </label>
                        <input type="date" name="deadline" class="form-control" value="{{ $todo->deadline }}">
                        <label for="status_id" class="form-label">状態 </label>
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
