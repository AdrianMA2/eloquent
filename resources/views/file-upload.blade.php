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
        <title>Subir Archivo</title>
        <style>
            table{width: 100%; text-align: center;}
        table, th, td {border: 1px solid;}
            .container {
                max-width: 500px;
            }
            dl, ol, ul {
                margin: 0;
                padding: 0;
                list-style: none;
            }
        </style>
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
                            </tr>
                            @foreach ($files as $file)
                                <tr>
                                    <td><b><a href="{{ url($file->file_path) }}">{{ $file->name }}</a></b></td>
                                    <td>{{ $file->created_at }}</td>
                                    <td>{{ $file->updated_at }}</td>
                                    
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </body>
    </html>
</x-app-layout>