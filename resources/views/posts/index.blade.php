<x-layout>
    @include('posts._header')
    <main class="max-w-6xl mx-auto mt-6 lg:mt-20 space-y-6">
        @if ($posts->count())
            <x-posts-grid :posts="$posts"/>

            {{$posts->links() }}
        @else
            <p class="text-center">Il n'y a pas de jeu. Revenez voir plus tard</p>
        @endif
    </main>
</x-layout>
