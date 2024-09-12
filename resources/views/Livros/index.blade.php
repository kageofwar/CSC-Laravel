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
<body class="bg-black">
    <div class="flex justify-center items-center translate-y-10">
        <h1 class="text-[3.5vh] text-white">Livros Cadastrados no sistema 📚</h1>
    </div>
    <div class="h-[90vh] w-full flex justify-center items-center ">
            <div class="w-[95%] h-[80%] overflow-auto border-2 border-black">


                <div class= h-full w-[100%] text-[1.5vh]">
                    <div class="grid grid-cols-[5%_10%_10%_10%_8%_8%_25%_14%_10%] w-[100%] h-[5vh] bg-blue-300 [&>*]:border-black font-bold 
                    [&>*]:flex [&>*]:justify-center [&>*]:items-center [&>*]:border-2 [&>*]:h-full [&>*]:w-full text-black">
                        <div>ID</div>
                        <div>Título</div>
                        <div>Descrição</div>
                        <div>Autor</div>
                        <div>Preço</div>
                        <div>Quantidade</div>
                        <div>Biografia do Autor</div>
                        <div>Naturalidade do Autor</div>
                        <div>Ação</div>
                    </div>
                    <div class="grid grid-cols-[5%_10%_10%_10%_8%_8%_25%_14%_10%] w-[100%] bg-blue-500 [&>*]:border-black
                        [&>*]:flex [&>*]:justify-center [&>*]:items-center [&>*]:border-2 [&>*]:h-full [&>*]:w-full text-white text-[1.5vh]">
                        @foreach($livros as $livro)
                        <div>{{ $livro->id }}</div>
                        <div>{{ $livro->titulo }}</div>
                        <div>{{ $livro->descricao }}</div>
                        <div>{{ $livro->autor }}</div>
                        <div>{{ $livro->preco }}</div>
                        <div>{{ $livro->quantidade }}</div>
                        <div><p class="h-32 overflow-auto p-2">{{ $livro->biografiaAutor }}</p></div>
                        <div>{{ $livro->naturalidadeAutor }}</div>
                        <div class="flex-col space-y-5 font-bold">
                            <td class="border border-gray-300 text-center px-4 py-2">
                                <a href="{{ route('livros.edit', ['livro' => $livro]) }}" class="transition ease-in-out delay-150 border-2 rounded-3xl border-yellow-600 hover:-translate-y-1 hover:scale-110 hover:bg-yellow-600 w-[70%] h-9 duration-300 flex items-center justify-center">Editar</a>
                            </td>
                            <td class="border border-gray-300 text-center px-4 py-2 w-full">
                                <form method="post" action="{{ route('livros.delete', ['livro' => $livro]) }}" class="w-[100%] flex justify-center items-center">
                                    @csrf
                                    @method('delete')
                                    <input type="submit" value="Deletar" class="transition ease-in-out delay-150 border-2 rounded-3xl border-red-600 hover:-translate-y-1 hover:scale-110 hover:bg-red-600 w-[70%] h-9 duration-300">
                                </form>
                            </td>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
            <div class="flex-col -translate-y-10 justify-items-center">
                <div class="">
                    <div class="">
                        @if(session()->has('success'))
                        <p class="text-[2vh] text-green-700">{{ session('success') }}</p>
                        @endif
                    </div>
                    <a href="{{ route('livros.create') }}" class="btn btn-outline-success h-9 flex items-center justify-center text-white">Cadastrar Livro</a>
                </div>
            </div>
    </body>
    </html>
    
    <style>
        
    </style>