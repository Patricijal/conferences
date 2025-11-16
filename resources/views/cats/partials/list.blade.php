<div>
    <h4>{{ $cat['name'] }}</h4>
    <p>{{ $cat['description'] }}</p>
    <a href="{{ route('cats.edit', ['cat' => $cat['id']]) }}"><button type="button">Edit</button></a>
    <form action="{{ route('cats.destroy', ['cat' => $cat['id']]) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Delete</button>
    </form>
    <br>
</div>
