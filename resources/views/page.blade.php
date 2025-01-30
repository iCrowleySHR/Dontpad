<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dontpad Clone</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        textarea {
            width: 100%;
            height: 85vh;
            font-size: 16px;
            resize: none;
        }

        .status {
            margin-top: 10px;
            color: green;
        }
    </style>
</head>

<body>
    <h1>Editing: {{ $page->slug }}</h1>
    <textarea id="content">{{ $page->content }}</textarea>
    <p class="status" id="status"></p>

    @vite('resources/js/app.js')
</body>

</html>