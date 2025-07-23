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
        <a href=>Deleted Books</a>
    @endif

    <table class="">
        <thead>
            <th>No</th>
            <th>books Name</th>
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
                    <td>{{ $b->title }}</td>
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