<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Books</title>
</head>
<body style="font-family: cursive">
    <h1>Books!</h1>
    <x-adnav></x-adnav>
    
    <a href="{{ route('books.create') }}">Create</a>

    @if(!$bookdel->isEmpty())
        <a href="{{ route('books.deleted') }}">Deleted Books</a>
    @endif

    <table class="">
        <thead>
            <th>No</th>
            <th>Image</th>
            <th>Title</th>
            <th>Category</th>
            <th>Author</th>
            <th>Publisher</th>
            <th>Action</th>
        </thead>
        <tbody>
            @forelse($books as $b)
                <tr>
                    <form action="{{ route('books.destroy', $b->id) }}" method="POST" id="form{{ $b->id }}">
                        @csrf
                        @method('delete')
                    </form>
                    <td>{{ $loop->iteration }}</td>
                    <td>
                        <img width="150px" src="{{ asset('/storage/books/'.$b->image) }}">
                    </td>
                    <td><a href="{{ route('books.show', $b->id) }}">{{ $b->title }}</a></td>
                    <td>{{ $b->category->category_name }}</td>
                    <td>{{ $b->author }}</td>
                    <td>{{ $b->publisher->publisher_name }}</td>
                    <td>
                        <a href="{{ route('books.edit', $b->id) }}">Edit</> || 
                        <a href="{{ route('books.destroy', $b->id) }}" onclick="event.preventDefault(); document.getElementById('form{{ $b->id }}').submit();">Delete</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3">No data yet :(</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>