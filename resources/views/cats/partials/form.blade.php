<fieldset class="fieldset bg-base-200 border-base-300 w-300 rounded-box border p-6 max-w-md">
    <legend class="fieldset-legend text-lg font-semibold">{{ __('app.Cat Information') }}</legend>

    <div class="space-y-4">
        <!-- Name Field -->
        <div>
            <label class="label" for="name-input">{{ __('app.Name') }}</label>
            <input
                id="name-input"
                type="text"
                class="input input-bordered w-full"
                name="name"
                placeholder="{{ __('app.Enter cat name') }}"
                value="{{ old('name', optional($cat ?? null)->name) }}"
            />
            @error('name')
            <p class="text-error text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Breed Field -->
        <div>
            <label class="label" for="breed-input">{{ __('app.Breed') }}</label>
            <input
                id="breed-input"
                type="text"
                class="input input-bordered w-full"
                name="breed"
                placeholder="{{ __('app.Enter cat breed') }}"
                value="{{ old('breed', optional($cat ?? null)->breed) }}"
            />
            @error('breed')
            <p class="text-error text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Age Field -->
        <div>
            <label class="label" for="age-input">{{ __('app.Age') }}</label>
            <input
                id="age-input"
                type="text"
                class="input input-bordered w-full"
                name="age"
                placeholder="{{ __('app.Enter cat age') }}"
                value="{{ old('age', optional($cat ?? null)->age) }}"
            />
            @error('age')
            <p class="text-error text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Gender Field -->
        <div>
            <label class="label" for="gender-input">{{ __('app.Gender') }}</label>
            <select
                id="gender-input"
                class="select select-bordered w-full"
                name="gender"
            >
                <option value="" disabled selected>{{ __('app.Select gender') }}</option>
                <option value="Male" {{ old('gender', optional($cat ?? null)->gender) == 'Male' ? 'selected' : '' }}>{{ __('app.Male') }}</option>
                <option value="Female" {{ old('gender', optional($cat ?? null)->gender) == 'Female' ? 'selected' : '' }}>{{ __('app.Female') }}</option>
            </select>
            @error('gender')
            <p class="text-error text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Description Field -->
        <div>
            <label class="label" for="description-input">{{ __('app.Description') }}</label>
            <textarea
                id="description-input"
                class="textarea textarea-bordered w-full"
                name="description"
                placeholder="{{ __('app.Describe the cat') }}"
                rows="3"
            >{{ old('description', optional($cat ?? null)->description) }}</textarea>
            @error('description')
            <p class="text-error text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        <!-- Image Field -->
        <div>
            <label class="label" for="image-input">{{ __('app.Cat Image') }}</label>

            <!-- Current Image Display -->
            @if(isset($cat) && $cat->image_path)
                <div class="mb-3" id="current-image-container">
                    <p class="text-sm text-base-content/60 mb-2">{{ __('app.Current image:') }}</p>
                    <img
                        src="{{ asset('cat-images/' . $cat->image_path) }}"
                        alt="Current cat image"
                        class="w-32 h-32 object-cover rounded border cursor-pointer hover:opacity-80 transition-opacity"
                        onclick="showFullImage('{{ asset('cat-images/' . $cat->image_path) }}')"
                    />
                    <p class="text-xs text-base-content/50 mt-1">{{ $cat->image_path }}</p>
                </div>
            @endif

            <!-- New Image Preview -->
            <div id="image-preview-container" class="mb-3 hidden">
                <p class="text-sm text-base-content/60 mb-2">{{ __('app.New image preview:') }}</p>
                <img
                    id="image-preview"
                    src="#"
                    alt="New image preview"
                    class="w-32 h-32 object-cover rounded border cursor-pointer hover:opacity-80 transition-opacity"
                    onclick="showFullImage(this.src)"
                />
            </div>

            <input
                type="file"
                id="image-input"
                class="file-input file-input-bordered w-full"
                name="image_path"
                accept="image/*"
                onchange="previewImage(this)"
            />
            @error('image_path')
            <p class="text-error text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>
    </div>
</fieldset>

<script>
    function previewImage(input) {
        const preview = document.getElementById('image-preview');
        const previewContainer = document.getElementById('image-preview-container');
        const currentImageContainer = document.getElementById('current-image-container');

        if (input.files && input.files[0]) {
            const reader = new FileReader();

            reader.onload = function(e) {
                preview.src = e.target.result;
                previewContainer.classList.remove('hidden');

                if (currentImageContainer) {
                    currentImageContainer.classList.add('hidden');
                }
            }

            reader.readAsDataURL(input.files[0]);
        } else {
            preview.src = "#";
            previewContainer.classList.add('hidden');

            if (currentImageContainer) {
                currentImageContainer.classList.remove('hidden');
            }
        }
    }

    function showFullImage(imageSrc) {
        const modal = document.getElementById('image-modal');
        const modalImage = document.getElementById('modal-image');

        modalImage.src = imageSrc;
        modal.showModal();
    }
</script>
