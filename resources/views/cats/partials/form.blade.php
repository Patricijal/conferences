<fieldset class="fieldset bg-base-200 border-base-300 rounded-box border p-6 max-w-md">
    <legend class="fieldset-legend text-lg font-semibold">Cat Information</legend>

    <div class="space-y-4">
        <!-- Name Field -->
        <div>
            <label class="label" for="name-input">Name</label>
            <input
                id="name-input"
                type="text"
                class="input input-bordered w-full"
                name="name"
                placeholder="Enter cat name"
                value="{{ old('name', optional($cat ?? null)->name) }}"
            />
            @error('name')
            <p class="text-error text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Breed Field -->
        <div>
            <label class="label" for="breed-input">Breed</label>
            <input
                id="breed-input"
                type="text"
                class="input input-bordered w-full"
                name="breed"
                placeholder="Enter cat breed"
                value="{{ old('breed', optional($cat ?? null)->breed) }}"
            />
            @error('breed')
            <p class="text-error text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Age Field -->
        <div>
            <label class="label" for="age-input">Age</label>
            <input
                id="age-input"
                type="text"
                class="input input-bordered w-full"
                name="age"
                placeholder="Enter cat age"
                value="{{ old('age', optional($cat ?? null)->age) }}"
            />
            @error('age')
            <p class="text-error text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Gender Field -->
        <div>
            <label class="label" for="gender-input">Gender</label>
            <select
                id="gender-input"
                class="select select-bordered w-full"
                name="gender"
            >
                <option value="" disabled selected>Select gender</option>
                <option value="Male" {{ old('gender', optional($cat ?? null)->gender) == 'Male' ? 'selected' : '' }}>Male</option>
                <option value="Female" {{ old('gender', optional($cat ?? null)->gender) == 'Female' ? 'selected' : '' }}>Female</option>
            </select>
            @error('gender')
            <p class="text-error text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Description Field -->
        <div>
            <label class="label" for="description-input">Description</label>
            <textarea
                id="description-input"
                class="textarea textarea-bordered w-full"
                name="description"
                placeholder="Describe the cat"
                rows="4"
            >{{ old('description', optional($cat ?? null)->description) }}</textarea>
            @error('description')
            <p class="text-error text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Image Field -->
        <div>
            <label class="label" for="image-input">Cat Image</label>
            <input
                type="file"
                id="image-input"
                class="file-input file-input-bordered w-full"
                name="image_path"
                accept="image/*"
            />
            @error('image_path')
            <p class="text-error text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
    </div>
</fieldset>
