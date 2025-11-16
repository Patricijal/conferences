<div>
    <h1>{{ $cat['name'] }}</h1>
    <h2>{{ $cat['breed'] }}</h2>
    <h3>{{ $cat['age'] }}</h3>
    <h3>{{ $cat['gender'] }}</h3>
    <h4>{{ $cat['description'] }}</h4>
    <img src="{{ asset('cat-images/' . $cat['image_path']) }}"
         alt="{{ $cat['name'] }}"
         height="200">
    <a href="{{ route('cats.edit', ['cat' => $cat['id']]) }}">
        <button type="button" class="btn btn-outline btn-info">Edit</button>
    </a>

    <!-- Delete button that opens modal -->
    <button type="button" class="btn btn-outline btn-error" onclick="document.getElementById('delete_modal_{{ $cat['id'] }}').showModal()">Delete</button>
    <!-- Delete Confirmation Modal -->
    <dialog id="delete_modal_{{ $cat['id'] }}" class="modal">
        <div class="modal-box">
            <h3 class="text-lg font-bold">Confirm Deletion</h3>
            <p class="py-4">Are you sure you want to delete <strong>{{ $cat['name'] }}</strong>? This action cannot be undone.</p>
            <div class="modal-action">
                <!-- Cancel button -->
                <form method="dialog">
                    <button class="btn btn-ghost">Cancel</button>
                </form>
                <!-- Actual delete form -->
                <form action="{{ route('cats.destroy', ['cat' => $cat['id']]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-error">Delete</button>
                </form>
            </div>
        </div>
        <!-- Click outside to close -->
        <form method="dialog" class="modal-backdrop">
            <button>close</button>
        </form>
    </dialog>
    <br>
</div>
