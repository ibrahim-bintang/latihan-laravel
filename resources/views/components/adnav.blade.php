<div>
    {{-- Goldshin Goldshin Goldshin. -Gold Ship --}}
    <form method="POST" action="{{ route('logout') }}" id="logout-form">
        @csrf
    </form>
    <div>
        <a href={{ route('admin.dashboard') }}>Dashboard</a>
        ||
        <a href={{ route('books.index') }}>Books</a>
        ||
        <a href={{ route('publisher.index') }}>Publishers</a>
        ||
        <a href={{ route('category.index') }}>Category</a>
        ||
        <a href="{{ route('logout') }}" class="text-red-500" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            {{ __('Log Out') }}
        </a>
        <hr>
    </div>
</div>