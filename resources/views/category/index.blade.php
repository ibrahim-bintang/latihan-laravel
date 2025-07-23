<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>categories</title>
</head>
<body style="font-family: cursive">
    <h1>Categories!</h1>
    <x-adnav></x-adnav>
    <a href="{{ route('category.create') }}">Create</a>
    <table class="">
        <thead>
            <th>No</th>
            <th>Category Name</th>
            <th>Action</th>
        </thead>
        <tbody>
            @forelse($cats as $c)
                <tr>
                    <form action="{{ route('category.destroy', $c->id) }}" method="POST" id="form{{ $c->id }}">
                        @csrf
                        @method('delete')
                    </form>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $c->category_name }}</td>
                    <td>
                        <a href="{{ route('category.edit', $c->id) }}">Edit</> || 
                        <a href="{{ route('category.destroy', $c->id) }}" onclick="event.preventDefault(); document.getElementById('form{{ $c->id }}').submit();">Delete</a>
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