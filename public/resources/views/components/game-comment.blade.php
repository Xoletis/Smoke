@props(['comment'])

<article class="bg-gray-100 border-gray-200 p-6 rounded-xl space-x-4 mb-3" style="background-color: #16202D">
    <div>
        <header class="mb-4">
            @if($comment->author->isAdmin != "0")
                <div class="font-bold flex" style="align-items: center; color: red">{{ $comment->author->username }}
                    <div style="font-size: 0.7em; margin-left: 5px; color: red">Admin</div>
                </div>
            @elseif($comment->author->isBan == "1")
                <div class="font-bold flex" style="align-items: center; color: green">{{ $comment->author->username }}
                    <div style="font-size: 0.7em; margin-left: 5px; color: red">Bannis</div>
                </div>
            @else
                <div class="font-bold flex" style="align-items: center; color: white">{{ $comment->author->username }}</div>
            @endif
            <p class="text-xs" style="color: white">
                Publié <time>{{ $comment->created_at->diffForHumans() }}</time>
            </p>
        </header>
        <p style="color: white">
            {{ $comment->body }}
        </p>
        @auth
            @if(auth()->user()->isAdmin == "1")
                <form method="POST" action="/comment/delete/{{$comment->id}}" class="bg-red-500 ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-5 mt-4">
                    @method('DELETE')
                    @csrf
                    <button type="submit">Supprimer</button>
                </form>
            @endif
        @endauth
    </div>
</article>
