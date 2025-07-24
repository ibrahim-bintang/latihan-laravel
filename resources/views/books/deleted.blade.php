<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Books</title>
</head>
<body style="font-family: cursive">
    <h1>Book Graveyard</h1>
    <x-adnav></x-adnav>

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
                    <form action="{{ route('books.perish', $b->id) }}" method="POST" id="form{{ $b->id }}">
                        @csrf
                        @method('delete')
                    </form>
                    <form action="{{ route('books.restore', $b->id) }}" method="POST" id="restore{{ $b->id }}">
                        @csrf
                        @method('patch')
                    </form>
                    <td>{{ $loop->iteration }}</td>
                    <td>
                        <img width="150px" src="{{ asset('/storage/books/'.$b->image) }}">
                    </td>
                    <td>{{ $b->title }}</td>
                    <td>{{ $b->category->category_name }}</td>
                    <td>{{ $b->author }}</td>
                    <td>{{ $b->publisher->publisher_name }}</td>
                    <td>
                        <a href="{{ route('books.restore', $b->id) }}" onclick="event.preventDefault(); document.getElementById('restore{{ $b->id }}').submit();">Restore</a>
                        <a href="{{ route('books.destroy', $b->id) }}" onclick="event.preventDefault(); document.getElementById('form{{ $b->id }}').submit();">Perish</a>
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