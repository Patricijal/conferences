<div class="flex flex-col items-center">
<div>
    <div class="card bg-base-100 w-150 shadow-sm">
        <figure>
            <img src="{{ asset('cat-images/' . $cat['image_path']) }}"
                 alt="{{ $cat['name'] }}"
                 height="200">
        </figure>
        <div class="card-body">
            <h2 class="card-title">{{ $cat['name'] }}</h2>
            <h3>{{ __("app.breed", ["breed" => $cat['breed']]) }}</h3>
            <h3>{{ __("app.age", ["age" => $cat['age']]) }}</h3>
            <h3>{{ __("app.gender", ["gender" => $cat['gender']]) }}</h3>
            <div class="card-actions justify-end">
                <!-- View button -->
                <a href="{{ route('cats.show', ['cat' => $cat['id']]) }}">
                    <button type="button" class="btn btn-outline btn-accent">
                        {{ __('app.view_details_button') }}
                    </button>
                </a>
                @auth
                <!-- Edit button -->
                <a href="{{ route('cats.edit', ['cat' => $cat['id']]) }}">
                    <button type="button" class="btn btn-outline btn-info">
                        {{ __('app.edit_button') }}
                    </button>
                </a>
                <!-- Delete button that opens modal -->
                <button type="button" class="btn btn-outline btn-error" onclick="document.getElementById('delete_modal_{{ $cat['id'] }}').showModal()">
                    {{ __('app.delete_button') }}
                </button>
                @endauth
            </div>
        </div>
    </div>


    <!-- Delete Confirmation Modal -->
    <dialog id="delete_modal_{{ $cat['id'] }}" class="modal">
        <div class="modal-box">
            <h3 class="text-lg font-bold">
                {{ __('app.confirm_deletion') }}
            </h3>
            <p class="py-4">
                {!! __('app.confirm_deletion_text', ['name' => '<strong>' . $cat['name'] . '</strong>']) !!}
            </p>
            <div class="modal-action">
                <!-- Cancel button -->
                <form method="dialog">
                    <button class="btn btn-ghost">{{ __('app.cancel_button') }}</button>
                </form>
                <!-- Actual delete form -->
                <form action="{{ route('cats.destroy', ['cat' => $cat['id']]) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-error">{{ __('app.delete_button') }}</button>
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
</div>
