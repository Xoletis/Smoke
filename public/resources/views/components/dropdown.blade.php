@props(['trigger'])

<div x-data="{ show: false }" @click.away="show = false">

    <div @click="show = !show">
        {{ $trigger }}
    </div>

    <div x-show="show" class="py-2 absolute w-32 bg-gray-100 mt-2 rounded-xl w-full z-50">
        {{ $slot }}
    </div>
</div>
