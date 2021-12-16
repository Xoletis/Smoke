
<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10 bg-gray-100 border border-gray-200 p-6 rounded-xl">

            <h1 class="text-center font-bold text-xl mb-6">Espace de {{ $user->name }}</h1>
            <div class="mb-6">
                <label class="block mb-2 font-bold text-xs text-gray-700">
                    Nom : {{ $user->name }}
                </label>
                <label class="block mb-2 font-bold text-xs text-gray-700">
                    Nom d'utilisateur : {{ $user->username }}
                </label>
                <label class="block mb-2 font-bold text-xs text-gray-700">
                    Adresse e-mail : {{ $user->email }}
                </label>
                <div class="mb-6">
                    <form method="GET" action="/user/{{ $user->username }}/modify">
                        <x-submit-button>
                            Modifier
                        </x-submit-button>
                    </form>
                </div>
            </div>
        </main>
    </section>
</x-layout>
