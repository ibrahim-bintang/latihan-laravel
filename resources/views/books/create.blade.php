<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>create book</title>
</head>
<body style="font-family: cursive">
    <h1>Create Book</h1>
    <form method="post" action="{{ route('books.store') }}" id="form" enctype="multipart/form-data">
        @csrf
        <label>Image</label>
        <input type="file" name="image">
        <br>
        @error('image')
            <span class="text-red-500">{{ $message }}</span>
        @enderror
        <br>

        <label>Title</label>
        <input type="text" name="title" placeholder="Book Title">
        <br>
        @error('title')
            <span class="text-red-500">{{ $message }}</span>
        @enderror
        <br>

        <label>Category</label>
        <select name="category">
            @if ($cats->isEmpty())
            <option selected disabled>No Category Yet :(</option>
            @else
                <option autofocus selected disabled>Select a Category</option>
                @foreach($cats as $c)
                    <option value="{{$c->id}}"">{{ $c->category_name }}</option>
                @endforeach
            @endif
        </select>
        <br>
        @error('category')
            <span class="text-red-500">{{ $message }}</span>
        @enderror
        <br>

        <label>Author Name</label>
        <input type="text" name="author" placeholder="Book Author">
        <br>
        @error('author')
            <span class="text-red-500">{{ $message }}</span>
        @enderror
        <br>

        <label>Publisher</label>
        <select name="publisher">
            @if ($pubs->isEmpty())
            <option selected disabled>No Publisher Yet :(</option>
            @else
                <option autofocus selected disabled>Select a Publisher</option>
                @foreach($pubs as $p)
                    <option value="{{$p->id}}"">{{ $p->publisher_name }}</option>
                @endforeach
            @endif
        </select>
        <br>
        @error('publisher')
            <span class="text-red-500">{{ $message }}</span>
        @enderror
        <br>

        <ul>
            @foreach($errors->all() as $e)
                <li>{{ $e }}</li>
            @endforeach
        </ul>
    </form>
    <a href="" onclick="event.preventDefault(); document.getElementById('form').submit();">Submit</a>
    <a href="" onclick="event.preventDefault(); document.getElementById('form').reset();">Reset</a>
</body>
</html>