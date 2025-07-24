<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Books</title>
</head>
<body style="font-family: cursive">
    <h1>This Book!</h1>
    <x-adnav></x-adnav>
    <img src="{{ asset('/storage/books/'.$book->image) }}">
    <br>
    <h2>{{ $book->title }}</h2>
    <p>Writer: {{ $book->author }}</p>
    Category: {{ $book->category->category_name }}
    ||  
    Publisher: {{ $book->publisher->publisher_name }}

</body>
</html>