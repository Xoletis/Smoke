<x-layout>
    <section class="px-6 py-8">
        <main class="max-w-lg mx-auto mt-10 bg-gray-100 border border-gray-200 p-6 rounded-xl">

            <h1 class="text-center font-bold text-xl uppercase">Liste des utilisateurs</h1>

            <br>
            @foreach($users as $user)
                @if(auth()->user()->username != $user->username)
                    <p>{{ $user->username }}</p>

                    @if($user->isAdmin != '1')
                        <div class="flex">
                            @if($user->isBan != 1)
                                <form method="POST" action="/{{ $user->username}}/setAdmin" class="mr-5">
                                    @method('PUT')
                                    @csrf
                                    <x-submit-button>Rendre Administrateur</x-submit-button>
                                </form>
                                <form method="POST" action="/{{ $user->username}}/Ban">
                                    @method('PUT')
                                    @csrf
                                    <x-submit-button>Bannir</x-submit-button>
                                </form>
                            @else
                                <form method="POST" action="/{{ $user->username}}/Unban">
                                    @method('PUT')
                                    @csrf
                                    <x-submit-button>Débannir</x-submit-button>
                                </form>
                            @endif
                        </div>
                    @else
                        <form method="POST" action="/{{ $user->username}}/removeAdmin">
                            @method('PUT')
                            @csrf
                            <x-submit-button>Supprimer des Administrateurs</x-submit-button>
                        </form>
                    @endif
                    <br>
                @endif
            @endforeach
        </main>
    </section>
</x-layout>
