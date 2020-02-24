<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Jenkkube Demo</title>

</head>
<body>
<div class="content">
<div class="content full-height flex-center">
    <h1>Jenkkube Demo</h1>
    <p>Try me out - hit my API using this endpoint for a random quote:</p>
    <p><pre>{{ url('/api/v1/quote') }}</pre></p>
</div>
</div>
</body>
</html>
