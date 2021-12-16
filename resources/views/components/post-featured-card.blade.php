@props(['post'])

<article
    class="transition-colors duration-300 hover:bg-gray-100 border border-black border-opacity-0 hover:border-opacity-5 rounded-xl">
    @if($post->slug == "doume")
        <div class="bg-yellow-300 rounded-xl font-semibold text-white uppercase py-3 px-5 text-center">EN VEDETTE</div>
    @endif
    <div class="py-6 px-5 lg:flex">
        <div class="flex-1 lg:mr-8">
            <img src="{{ $post->image }}" alt="{{ $post->title }} illustration" class="rounded-xl">
        </div>

        <div class="flex-1 flex flex-col justify-between">
            <header class="mt-8 lg:mt-0">
                <div class="space-x-2">
                    <x-category-button :category="$post->category" />
                </div>

                <div class="mt-4">
                    <h1 class="text-3xl">
                        {!! $post->title !!}
                    </h1>

                    <span class="mt-2 block text-gray-400 text-xs">
                        Publié <time>{{ $post->created_at->diffForHumans() }}</time>
                    </span>
                </div>
            </header>

            <div class="text-sm mt-2">
                <p>
                    {{ $post->excerpt }}
                </p>
                <br>
                <h6><p> Téléchargé {{ $post->nbDownload }} fois</p></h6>
            </div>

            <footer class="flex justify-between items-center mt-8">
                <div class="flex items-center text-sm">
                    <div class="ml-3">
                       <h5 class="font-bold">{{ $post->author->username }}</h5>
                    </div>
                </div>

                <div class="hidden lg:block">
                    <a href="/posts/{{ $post->slug }}"
                       class="transition-colors duration-300 text-xs font-semibold bg-gray-200 hover:bg-gray-300 rounded-full py-2 px-8"
                    >Télécharger</a>
                </div>
                @auth
                    @if(auth()->user()->name == $post->author->name or auth()->user()->isAdmin == "1")
                        <form method="POST" action="/post/{{$post->slug}}" class="bg-red-500 ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-5">
                            @method('DELETE')
                            @csrf
                            <button type="submit">Supprimer</button>
                        </form>
                    @endif
                @endauth
            </footer>
        </div>
    </div>
</article>
