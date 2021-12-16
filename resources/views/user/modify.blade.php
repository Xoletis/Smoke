<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10 bg-gray-100 border border-gray-200 p-6 rounded-xl">

            <h1 class="text-center font-bold text-xl uppercase">MODIFIER LE PROFIL DE {{ $user->username }} !</h1>

            <div class="mt-10">
                <form method="POST" action="/{{ $user->username}}/update">
                    @method('PUT')
                    @csrf

                    <div class="mb-6">
                        <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                               for="name"
                        >
                            Nom
                        </label>

                        <input class="border border-gray-400 p-2 w-full"
                               type="text"
                               name="name"
                               id="name"
                               value="{{ old('name') }}"
                               required
                        >

                        @error('name')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
                               for="username"
                        >
                            Nom d'utilisateur
                        </label>

                        <input class="border border-gray-400 p-2 w-full"
                               type="text"
                               name="username"
                               id="username"
                               value="{{ old('username') }}"
                               required
                        >

                        @error('username')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="mb-6">
                        <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
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
                        <label class="block mb-2 uppercase font-bold text-xs text-gray-700"
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
                        <x-submit-button>
                            Valider
                        </x-submit-button>
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
