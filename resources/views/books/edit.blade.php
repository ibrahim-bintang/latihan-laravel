<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>edit book</title>
</head>
<body style="font-family: cursive">
    <h1>edit Book</h1>
    <form method="post" action="{{ route('books.update', $book->id) }}" id="form" enctype="multipart/form-data">
        @csrf
        @method('put')
        <label>Image</label>
        <input type="file" name="image">
        <br>
        @error('image')
            <span class="text-red-500">{{ $message }}</span>
        @enderror
        <br>

        <label>Title</label>
        <input type="text" name="title" placeholder="Book Title" value="{{ $book->title }}">
        <br>
        @error('title')
            <span class="text-red-500">{{ $message }}</span>
        @enderror
        <br>

        <label>Category</label>
        <select name="category">
            @foreach($cats as $c)
                @if($c->id === $book->category)
                    <option value="{{$c->id}}" selected>{{$c->category_name}}</option>
                @else
                <option value="{{$c->id}}">{{$c->category_name}}</option>
                @endif
            @endforeach
        </select>
        <br>
        @error('category')
            <span class="text-red-500">{{ $message }}</span>
        @enderror
        <br>

        <label>Author Name</label>
        <input type="text" name="author" placeholder="Book Author" value="{{ $book->author }}">
        <br>
        @error('author')
            <span class="text-red-500">{{ $message }}</span>
        @enderror
        <br>

        <label>Publisher</label>
        <select name="publisher">
            @foreach($pubs as $c)
                @if($c->id === $book->publisher)
                    <option value="{{$c->id}}" selected>{{$c->publisher_name}}</option>
                @else
                <option value="{{$c->id}}">{{$c->publisher_name}}</option>
                @endif
            @endforeach
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