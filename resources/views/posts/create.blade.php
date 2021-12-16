<x-layout>
    <section class="py-8 max-w-md mx-auto">
        <h1 class="text-lg font-bold mb-4">
            Publier un nouveau jeu
        </h1>
        <x-panel>
            <form method="POST" action="/game/posts">
                @csrf
                <div class="mb-6">
                    <label class="block mb-2 uppercase font-blod text-xs text-gray-700"
                           for="title"
                    >
                        Nom du jeu
                    </label>
                    <input class="border border-gray-400 p-2 w-full"
                           type="text"
                           name="title"
                           id="title"
                           value="{{ old('title') }}"
                           required
                    >

                    @error('title')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label class="block mb-2 uppercase font-blod text-xs text-gray-700"
                           for="slug"
                    >
                        lien dans le site
                    </label>
                    <input class="border border-gray-400 p-2 w-full"
                           type="text"
                           name="slug"
                           id="slug"
                           value="{{ old('slug') }}"
                           required
                    >

                    @error('slug')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label class="block mb-2 uppercase font-blod text-xs text-gray-700"
                           for="image"
                    >
                        Image du jeu
                    </label>
                    <input class="border border-gray-400 p-2 w-full"
                           type="text"
                           name="image"
                           id="image"
                           value="{{ old('image') }}"
                           required
                    >

                    @error('image')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                           for="excerpt"
                    >
                        Présentation
                    </label>

                    <textarea class="border border-gray-400 p-2 w-full"
                              name="excerpt"
                              id="excerpt"
                              value="{{ old('excerpt') }}"
                              required
                    ></textarea>

                    @error('excerpt')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                           for="descritption"
                    >
                        Description
                    </label>

                    <textarea class="border border-gray-400 p-2 w-full"
                              name="descritption"
                              id="descritption"
                              value="{{ old('descritption') }}"
                              required
                    ></textarea>

                    @error('descritption')
                        <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label class="block mb-2 uppercase font-blod text-xs text-gray-700"
                           for="category_id"
                    >
                        Catégorie
                    </label>
                    <select name="category_id" id="category_id">
                        @foreach(\App\Models\Category::all() as $category)
                            <option value="{{ $category->id }}"
                                {{ old('category_id') == $category->id ? 'selected' : ''}}
                            > {{ ucwords($category->name) }}</option>
                        @endforeach
                    </select>

                    @error('category')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <div class="mb-6">
                    <label class="block mb-2 uppercase font-blod text-xs text-gray-700"
                           for="link"
                    >
                        lien de téléchargement du jeu
                    </label>
                    <input class="border border-gray-400 p-2 w-full"
                           type="text"
                           name="link"
                           id="link"
                           value="{{ old('link') }}"
                           required
                    >

                    @error('link')
                    <p class="text-red-500 text-xs mt-2">{{ $message }}</p>
                    @enderror
                </div>

                <x-submit-button>Publier</x-submit-button>
            </form>
        </x-panel>
    </section>
</x-layout>
