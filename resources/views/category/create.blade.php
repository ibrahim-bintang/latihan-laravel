<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>create category</title>
</head>
<body style="font-family: cursive">
    <h1>Create Category</h1>
    <form method="post" action="{{ route('category.store') }}" id="form">
        @csrf
        <label>Category Name</label>
        <input type="text" name="category_name" placeholder="Category Name">
        <br>
    </form>
    <a href={{ route('category.store') }} onclick="event.preventDefault(); document.getElementById('form').submit();">Submit</a>
</body>
</html>