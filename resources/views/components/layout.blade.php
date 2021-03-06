<!doctype html>
<title>SMOKE</title>
<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
<link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600;700&display=swap" rel="stylesheet">
<link rel="icon" type="images/png" href="images/logo.png" />
<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>

<body style="font-family: Open Sans, sans-serif; background-color: #1B2838">
<section class="px-6 py-8">
    <nav class="md:flex md:justify-between md:items-center">
        <div>
            <a href="/">
                <img src="/images/Logo.png" alt="Smoke Logo" width="117" height="12">
            </a>
        </div>

        <div class="mt-8 md:mt-0 flex items-center">
            @auth
                <a class="text-xs font-bold uppercase">Bonjour <a href="/user/{{ auth()->user()->username }}" class="text-xs font-bold uppercase ml-2 mr-2"> {{ auth()->user()->username }} </a> !</a >
                <form method="POST" action="/logout" class="bg-red-500 ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-5">
                    @csrf
                    <button type="submit">Deconexion</button>
                </form>

            @else
                <a href="/login" class="text-xs font-bold uppercase">Connexion</a>
                <a href="/register" class="bg-blue-500 ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-5">
                    S'inscrire
                </a>
            @endauth
        </div>
    </nav>

    <div class="mt-8 md:mt-0 flex items-center" style="float: right">
        @auth
            @if(auth()->user()->isBan == 0)
                <a href="/game/posts/create" class="bg-blue-500 ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-5">
                    Publier un jeu
                </a>
            @else
                <div class="bg-blue-500 ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-5">
                    Vous ne pouvez pas publier, vous ??tes bannis pour cause de mauvais comportement.
                </div>
            @endif
            @if(auth()->user()->isAdmin == "1")
                <div>
                    <a href="/user" class="bg-blue-500 ml-3 rounded-full text-xs font-semibold text-white uppercase py-3 px-5">
                        Utilisateur
                    </a>
                </div>
            @endif
        @endauth
    </div>

    {{ $slot }}

    <br>

    <div style="font-size: 0.6em; color: white">Par Soupape Corporation</div>
</section>

<x-flash />

</body>
