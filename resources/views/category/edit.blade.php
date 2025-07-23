<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>edit category</title>
</head>
<body style="font-family: cursive">
    <h1>edit Category</h1>
    <form method="post" action="{{ route('category.update', $cat->id) }}" id="form">
        @csrf
        @method('put')
        <label>Category Name</label>
        <input type="text" name="category_name" placeholder="Category Name" value={{ $cat->category_name }}>
        <br>
    </form>
    <a href={{ route('category.update', $cat->id) }} onclick="event.preventDefault(); document.getElementById('form').submit();">Submit</a>
</body>
</html>