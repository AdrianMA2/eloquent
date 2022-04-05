<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edita la Película') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div>
                <a href="{{ route('peliculas.index') }}" title="Go back">ATRÁS </a>
            </div>

    <form action="{{ route('peliculas.update', $plato->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div>
            <div>
                <strong>Titulo:</strong><p></p>
                <input type="text" name="title" value="{{ $film->title }}" placeholder="Titulo">
            </div>
            <div>
                <strong>Descripcion:</strong><p></p>
                <textarea style="height:50px" name="description"
                    placeholder="Descripcion">{{ $plato->description }}</textarea>
            </div>
            <div>
                <strong>Descripcion:</strong><p></p>
                <textarea style="height:50px" name="description"
                    placeholder="Descripcion">{{ $plato->description }}</textarea>
            </div>
            <div>
                <strong>Precio:</strong><p></p>
                <input type="number" name="Precio" placeholder="{{ $plato->release_year }}"
                    value="{{ $plato->Precio }}">
            </div>
            <div>
                <strong>Imagen:</strong><p></p>
                <input type="file" name="img" placeholder="Imagen">
                <img src="/img/platos/{{ $plato->img }}" width="350px">
            </div>
            <div>
                <button type="submit">Submit</button>
            </div>
        </div>
    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>