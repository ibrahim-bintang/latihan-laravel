<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>publishers</title>
</head>
<body style="font-family: cursive">
    <h1>Publishers!</h1>
    <x-adnav></x-adnav>
    <a href="{{ route('publisher.create') }}">Create</a>
    <table class="">
        <thead>
            <th>No</th>
            <th>Publisher Name</th>
            <th>Action</th>
        </thead>
        <tbody>
            @forelse($pubs as $p)
                <tr>
                    <form action="{{ route('publisher.destroy', $p->id) }}" method="POST" id="form{{ $p->id }}">
                        @csrf
                        @method('delete')
                    </form>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $p->publisher_name }}</td>
                    <td>
                        <a href="{{ route('publisher.edit', $p->id) }}">Edit</> || 
                        <a href="{{ route('publisher.destroy', $p->id) }}" onclick="event.preventDefault(); document.getElementById('form{{ $p->id }}').submit();">Delete</a>
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