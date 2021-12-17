<x-layout>
    <section class="px-6 py-8">
        <main class="py-8 max-w-md mx-auto border border-gray-200 p-6 rounded-xl">

            <h1 class="text-center font-bold text-xl">CONEXION !</h1>
            <div class="mt-10">
                <form method="POST" action="/login">
                    @csrf

                    <div class="mb-6">
                        <label class="block mb-2 uppercase font-bold text-xs text-white"
                               for="email"
                        >
                            E-mail
                        </label>

                        <input class="border border-gray-400 p-2 w-full"
                               type="email"
                               name="email"
                               id="email"
                               value="{{ old('email') }}"
                               required
                        >

                        @error('email')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label class="block mb-2 uppercase font-bold text-xs text-white"
                               for="password"
                        >
                            Mot de passe
                        </label>

                        <input class="border border-gray-400 p-2 w-full"
                               type="password"
                               name="password"
                               id="password"
                               required
                        >

                        @error('password')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <button type="submit"
                                class="bg-blue-400 text-white rounded py-2 px-4 hover:bg-blue-500"
                        >
                            Connexion
                        </button>
                    </div>

                    @if ($errors->any())
                        <ul>
                            @foreach($errors->all() as $error)
                                <li class="text-red-500 text-xs">{{ $error }}</li>
                            @endforeach
                        </ul>
                    @endif
                </form>
            </div>

        </main>
    </section>
</x-layout>
