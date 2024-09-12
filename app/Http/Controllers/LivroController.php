<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Livro;
use Illuminate\Support\Facades\Http;
use App\Http\Requests\LivroFormRequest;

class LivroController extends Controller
{
    public function create(LivroformRequest $request){
        $livro = new Livro();

        $livro->titulo = $request->input('titulo');
        $livro->descricao = $request->input('descricao');
        $livro->autor = $request->input('autor');
        $livro->preco = $request->input('preco');
        $livro->quantidade = $request->input('quantidade');

        if ($livro->autor){
            $autorInfo = Http::get("https://openlibrary.org/search/authors.json", [
                "q" => $livro->autor
            ])->object();
            
            $keyDoAutor = $autorInfo->docs[0]->key;
            
            $autorInfoKey = Http::get("https://openlibrary.org/authors/".$keyDoAutor.".json")->object();


            $livro->biografiaAutor = $autorInfoKey->bio;
            //Não achei a nacionalidade, por isso não coloquei :/
        }
        
        $livro->save();
        
        return response()->json([
            'mensagem' => 'Livro cadastrado com sucesso!',
            'livro' => $livro
        ], 202);
    }

    public function index() {
        $livros = Livro::all();

        return response()->json([
            'mensagem' => 'Livros encontrados',
            'livro' => $livros
        ], 202);
    }

    public function show($id) {
        $livro = Livro::findOrFail($id);

        $authorDoLivro = Http::get("https://openlibrary.org/search/authors.json", [
            "q" => $livro->autor
        ])->object();

        //return response()->json([
        //    'mensagem' => 'Livro encontrado',
        //    'livro' => $livro
        //], 202);
    }

    public function edit(Request $request, $id){
        $livro = Livro::findOrFail($id);

        $livro->titulo = $request->input('titulo');
        $livro->descricao = $request->input('descricao');
        $livro->autor = $request->input('autor');
        $livro->preco = $request->input('preco');
        $livro->quantidade = $request->input('quantidade');

        $livro->update();

        return response()->json([
            'mensagem' => 'Livro editado com sucesso!',
            'livro' => $livro
        ], 202);
    } 

    public function delete($id){
        $livro = Livro::findOrFail($id);

        $livro->delete();

        return response()->json([
            'mensagem' => 'Livro deletado com sucesso!'
        ]);
    }
}
