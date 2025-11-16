<h4>Cat form</h4>
<div>
    <label for="name-input">Title</label>
    <input id="name-input" type="text" name="name" value="{{old('name', optional($cat ?? null)->name) }}">
    @error('name')
    <p>{{ $message }}</p>
    @enderror
</div>
<br>
<div>
    <label for="breed-input">Breed</label>
    <input id="breed-input" type="text" name="breed" value="{{old('breed', optional($cat ?? null)->breed) }}">
    @error('breed')
    <p>{{ $message }}</p>
    @enderror
</div>
<br>
<div>
    <label for="age-input">Age</label>
    <input id="age-input" type="text" name="age" value="{{old('age', optional($age ?? null)->age) }}">
    @error('age')
    <p>{{ $message }}</p>
    @enderror
</div>
<br>
<div>
    <label for="gender-input">Gender</label>
    <input id="gender-input" type="text" name="gender" value="{{old('gender', optional($gender ?? null)->age) }}">
    @error('gender')
    <p>{{ $message }}</p>
    @enderror
</div>
<br>
<div>
    <label for="description-input">Description</label>
    <textarea id="description-input" name="description">{{ old('description', optional($cat ?? null)->description) }}</textarea>
    @error('description')
    <p>{{ $message }}</p>
    @enderror
</div>
<br>
<div>
    <label for="image-input">Cat Image</label>
    <input type="file" id="image-input" name="image_path" accept="image/*">
    @error('image_path')
    <p>{{ $message }}</p>
    @enderror
</div>
<br>
