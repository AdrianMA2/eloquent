<x-app-layout>
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <style>
        .button {text-align: center; transition-duration: 0.6s;   padding: 3px 6px;}
        .button1 {border-radius: 4px; background-color: rgb(96, 178, 192); color: white;}
        .button2 {border-radius: 4px; background-color: white; color: black; border: 1px solid #d86969;}
        .button2:hover {background-color: #d86969;color: white;}
        .buscador{width:30%; border-color: black;}
        .boton_buscar{text-align: center; transition-duration: 0.6s;}
        .boton_buscar1{ width: 40px; height: 40px; border-radius: 4px; padding: 4px;position: relative; top: 15px;}
        .boton_buscar1:hover {border: 2px solid #4a7bee;}

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
