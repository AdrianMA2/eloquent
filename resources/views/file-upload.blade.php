<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Archivos') }}
        </h2>
    </x-slot>
    <!doctype html>
    <html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        <link rel="stylesheet" href="{{ asset('css/css.css') }}" />
        <title>Subir Archivo</title>
    </head>
    <body>
        <div class="container mt-5">
            <form action="{{route('fileUpload')}}" method="post" enctype="multipart/form-data">
              <h3 class="text-center mb-5">Subir Archivo</h3>
                @csrf
                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <strong>{{ $message }}</strong>
                </div>
              @endif
              @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
              @endif
                <div class="custom-file">
                    <input type="file" name="file" class="custom-file-input" id="chooseFile">
                    <label class="custom-file-label" for="chooseFile">Select file</label>
                </div>
                <button type="submit" name="submit" class="btn btn-primary btn-block mt-4">
                    Subir Archivo
                </button>
            </form>
        </div>
        
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-red overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <table>
                            <tr>
                                <th>Nombre</th>
                                <th>Creado</th>
                                <th>Actualizado</th>
                                <th>Action</th>
                            </tr>
                            @foreach ($files as $file)
                                <tr>
                                    <td class="parcelanombre"><b><a href="{{ url($file->file_path) }}">{{ $file->name }}</a></b></td>
                                    <td>{{ $file->created_at }}</td>
                                    <td>{{ $file->updated_at }}</td>
                                    <!--<td><a href="{ {route('descargar', $file)}}">Descargar</a></td>-->
                                    <td class="parcelaboton"><button class="btn">
                                      <a class="blanco" href="{{route('descargar', $file)}}">
                                        <i class="fa fa-download"></i> Download
                                      </a>
                                    </button></td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </body>
    </html>
    <script>let downloadButton = document.querySelector('.button');
      if(downloadButton) {    
        downloadButton.addEventListener('click', function(event) {
          event.preventDefault();
          
          /* Start loading process. */
          downloadButton.classList.add('loading');
          
          /* Set delay before switching from loading to success. */
          window.setTimeout(function() {
            downloadButton.classList.remove('loading');
            downloadButton.classList.add('success');
          }, 3000);
          
          /* Reset animation. */
          window.setTimeout(function() {
            downloadButton.classList.remove('success');
          }, 8000);
        });
      };</script>
</x-app-layout>