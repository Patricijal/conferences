<div>
    <h1>{{ $cat['name'] }}</h1>
    <h2>{{ $cat['breed'] }}</h2>
    <h3>{{ $cat['age'] }}</h3>
    <h3>{{ $cat['gender'] }}</h3>
    <h4>{{ $cat['description'] }}</h4>
    <img src="{{ asset('cat-images/' . $cat['image_path']) }}"
         alt="{{ $cat['name'] }}"
         height="200">
    <a href="{{ route('cats.edit', ['cat' => $cat['id']]) }}"><button type="button" class="btn btn-outline btn-info">Edit</button></a>
    <form action="{{ route('cats.destroy', ['cat' => $cat['id']]) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-outline btn-error">Delete</button>
    </form>
    <br>
</div>
