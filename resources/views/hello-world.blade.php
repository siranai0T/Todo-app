<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Hello World</title>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <script src="{{ asset('js/app.js') }}"></script>
</head>

<body class="text-center">
    <div class="container">
        <form method="post" action="{{ route('hello.world') }}">
            @csrf
            @if (isset($name))
            {{ $name . 'さん。いらっしゃいませ' }}
            @endif
            <div class="mb-3">

                <label for="name" class="form-label">あなたの名前を教えてね</label>
                <input type="text" class="form-control" name="name" value="{{ $name ?? '' }}">

            </div>
            <div class="d-flex justify-content-center mb-3">
                <button type="submit" class="btn btn-primary">登録</button>
            </div>
        </form>

    </div>
</body>

</html>
