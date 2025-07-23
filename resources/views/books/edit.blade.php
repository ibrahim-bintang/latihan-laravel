<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>edit publisher</title>
</head>
<body style="font-family: cursive">
    <h1>edit Publisher</h1>
    <form method="post" action="{{ route('publisher.update', $pub->id) }}" id="form">
        @csrf
        @method('put')
        <label>Publisher Name</label>
        <input type="text" name="publisher_name" placeholder="Publisher Name" value={{ $pub->publisher_name }}>
        <br>
    </form>
    <a href={{ route('publisher.update', $pub->id) }} onclick="event.preventDefault(); document.getElementById('form').submit();">Submit</a>
</body>
</html>