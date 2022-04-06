<x-app-layout>
    <link href="{{ asset('css/css.css') }}" rel="stylesheet">
    <style>
        
      </style>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <form action="{{ route('peliculas.buscarfilm') }}" method="POST">@csrf Peliculas:
              <input class="buscador" placeholder="Buscar.." type="text" id="buscarfilm" name="buscarfilm">
              <input class="boton_buscar boton_buscar1" type="image" src="img\icon_buscar.png" name="search" id="search">    
            
    </x-slot>
    
    @foreach ($films as $film)
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-red overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <ul>
                        <li><b><u> {{$film->title}} </u></b></li>
                        <li> {{$film->description}} </li>
                        <li> {{$film->special_features}} </li>
                        <li> {{$film->release_year}} </li>
                        <li> {{$film->rental_rate}}€ </li>
                        <a class="button button1" href="{ { route('peliculas.edit', $film->id) }}">Editar</a>
                        <a>|</a>
                        <a class="button button2" href="{ { route('peliculas.destroy', $film->id) }}">Eliminar</a>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    @endforeach

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            {{$films->links()}}
        </div>
    </div>
</x-app-layout>
