<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-black">
    <a href="{{ route('livros.index') }}" class="w-[20vh] flex items-center justify-center rounded-2xl text-white h-10 m-5 bg-blue-500">Voltar</a>
    <div class="mt-20">
        <div class="flex justify-center items-center">
            <h1 class="text-[5vh] text-white">Cadastrar novo Livro 📚</h1>
        </div>
        <div class="flex justify-center items-center">
            @if($errors->any())
            <ul class="text-red-300">
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
            @endif
        </div>
        <form method="POST" action="{{ route('livros.store') }}" class="max-w-lg mx-auto bg-white shadow-md rounded-lg p-6 space-y-4">
            @csrf
            @method('POST')
            
            <div class="mb-4">
                <label for="titulo" class="block text-gray-700 text-sm font-bold mb-2">Título do Livro</label>
                <input 
                type="text" 
                name="titulo" 
                placeholder="Título" 
                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                >
            </div>
            
            <div class="mb-4">
                <label for="descricao" class="block text-gray-700 text-sm font-bold mb-2">Descrição do Livro</label>
                <input 
                type="text" 
                name="descricao" 
                placeholder="Descrição" 
                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                >
            </div>
            
            <div class="mb-4">
                <label for="autor" class="block text-gray-700 text-sm font-bold mb-2">Autor do Livro</label>
                <input 
                type="text" 
                name="autor" 
                placeholder="Autor" 
                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                >
            </div>
            
            <div class="mb-4">
                <label for="preco" class="block text-gray-700 text-sm font-bold mb-2">Preço do Livro</label>
                <input 
                type="text" 
                name="preco" 
                placeholder="Preço" 
                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                >
            </div>
            
            <div class="mb-4">
                <label for="quantidade" class="block text-gray-700 text-sm font-bold mb-2">Quantidade em Estoque</label>
                <input 
                type="number" 
                name="quantidade" 
                placeholder="Quantidade" 
                class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                >
            </div>
            
            <div>
                <input 
                type="submit" 
                value="Salvar novo Livro" 
                class="w-full bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded-lg cursor-pointer transition duration-300 ease-in-out"
                />
            </div>
        </form>
        
    </div>
    </body>
</html>