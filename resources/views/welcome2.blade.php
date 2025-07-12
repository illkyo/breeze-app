<!doctype html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Laravel</title>
</head>
<body>
  @if($name === 'John')
    <h1>Hello {{ $name }}</h1>
  @else
    <h1>Hello Guest</h1>
  @endif
</body>
</html>