<h4>Article form</h4>
<div>
    <label for="title-input">Title</label>
    <input id="title-input" type="text" name="title" value="{{old('title', optional($article ?? null)->title) }}">
    @error('title')
    <p>{{ $message }}</p>
    @enderror
</div>
<br>
<div>
    <label for="content-input">Content</label>
    <textarea id="content-input" name="content">{{ old('content', optional($article ?? null)->content) }}</textarea>
    @error('content')
    <p>{{ $message }}</p>
    @enderror
</div>
<br>
