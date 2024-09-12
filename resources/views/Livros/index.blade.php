<!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>Pagina Principal</title>
    @vite('resources/css/app.css')
</head>
<body>
    <div class="flex justify-center items-center">
        <h1 class="text-[5vh]">Livros Cadastrados no sistema 📚</h1>
    </div>
    <div class="">
        <a href="{{ route('livros.create') }}" class="btn btn-outline-success">Cadastrar Livro</a>
    </div>
    <div class="h-[90vh] w-full flex justify-center items-center">
            <div class="w-[80%] h-[80%] overflow-auto">

                <div>
                    @if(session()->has('success'))
                    <div>
                        {{ session('success') }}
                    </div>
                    @endif
                </div>

                <table class="table-auto border-collapse border border-gray-300 w-full shadow-lg rounded-lg">
                    <thead>
                        <tr class="bg-gray-200 text-gray-700">
                            <th class="border border-gray-300 text-center px-4 py-2 font-bold">ID</th>
                            <th class="border border-gray-300 text-center px-4 py-2 font-bold">Título</th>
                            <th class="border border-gray-300 text-center px-4 py-2 font-bold">Descrição</th>
                            <th class="border border-gray-300 text-center px-4 py-2 font-bold">Autor</th>
                            <th class="border border-gray-300 text-center px-4 py-2 font-bold">Preço</th>
                            <th class="border border-gray-300 text-center px-4 py-2 font-bold">Quantidade</th>
                            <th class="border border-gray-300 text-center px-4 py-2 font-bold">Biografia do Autor</th>
                            <th class="border border-gray-300 text-center px-4 py-2 font-bold">Naturalidade do Autor</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white">
                        @foreach($livros as $livro)
                        <tr class="border border-gray-300 hover:bg-gray-50 transition duration-200 ease-in-out">
                            <td class="border border-gray-300 text-center px-4 py-2">{{ $livro->id }}</td>
                            <td class="border border-gray-300 text-center px-4 py-2">{{ $livro->titulo }}</td>
                            <td class="border border-gray-300 text-center px-4 py-2">{{ $livro->descricao }}</td>
                            <td class="border border-gray-300 text-center px-4 py-2">{{ $livro->autor }}</td>
                            <td class="border border-gray-300 text-center px-4 py-2">{{ $livro->preco }}</td>
                            <td class="border border-gray-300 text-center px-4 py-2">{{ $livro->quantidade }}</td>
                            <td class="border border-gray-300 text-center px-4 py-2">{{ $livro->biografiaAutor }}</td>
                            <td class="border border-gray-300 text-center px-4 py-2">{{ $livro->naturalidadeAutor }}</td>
                            <td class="border border-gray-300 text-center px-4 py-2">
                                <a href="{{ route('livros.edit', ['livro' => $livro]) }}" class="text-blue-500 hover:text-blue-700 font-semibold">Edit</a>
                            </td>
                            <td class="border border-gray-300 text-center px-4 py-2">
                                <form method="post" action="{{ route('livros.delete', ['livro' => $livro]) }}">
                                    @csrf
                                    @method('delete')
                                    <input type="submit" value="Delete" class="text-red-500 hover:text-red-700 font-semibold cursor-pointer">
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </body>
    </html>
    
    <style>
        
    </style>