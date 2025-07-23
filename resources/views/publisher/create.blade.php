<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>create publisher</title>
</head>
<body style="font-family: cursive">
    <h1>Create Publisher</h1>
    <form method="post" action="{{ route('publisher.store') }}" id="form">
        @csrf
        <label>Publisher Name</label>
        <input type="text" name="publisher_name" placeholder="Publisher Name">
        <br>
    </form>
    <a href={{ route('publisher.store') }} onclick="event.preventDefault(); document.getElementById('form').submit();">Submit</a>
</body>
</html>