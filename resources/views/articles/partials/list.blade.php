<div>
    <h4>{{ $article['title'] }}</h4>
    <p>{{ $article['content'] }}</p>
    <a href="{{ route('articles.edit', ['article' => $article['id']]) }}"><button type="button">Edit</button></a>
    <form action="{{ route('articles.destroy', ['article' => $article['id']]) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">Delete</button>
    </form>
    <br>
</div>
