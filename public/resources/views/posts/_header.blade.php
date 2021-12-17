<header class="max-w-xl mx-auto mt-20 text-center">
    <a href="/"><img  src="/images/Name.png" class="mx-auto -mb-6" style="width: 145px;"></a>

    <div class="space-y-2 lg:space-y-0 lg:space-x-4 mt-8">
        <!--  Category -->
        <div class="relative flex lg:inline-flex items-center bg-gray-100 rounded-xl">
            <div x-data="{ show: false}" @click.away="show = false">
                <x-category-dropdown />
            </div>
        </div>
        <!--Recherche-->
        <div class="relative flex lg:inline-flex items-center bg-gray-100 rounded-xl px-3 py-2">
            <form method="GET" action="/">
                @if(request('category'))
                    <input type="hidden" name="category" value="{{ request("category") }}">
                @endif

                <input type="text"
                       name="search"
                       placeholder="Recherche"
                       class="bg-transparent placeholder-black font-semibold text-sm"
                       value="{{ request('search') }}">
            </form>
        </div>
    </div>
</header>
