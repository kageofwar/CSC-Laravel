<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Livro;
use Illuminate\Support\Facades\Http;
use App\Http\Requests\LivroFormRequest;

class LivroController extends Controller
{
    public function create(){
        return view('livros.create');
    }

    public function store(LivroformRequest $request){
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
        
        //return response()->json([
        //    'mensagem' => 'Livro cadastrado com sucesso!',
        //    'livro' => $livro
        //], 202);

        return redirect(route('livros.index'));
    }

    public function index() {
        $livros = Livro::all();

        //return response()->json([
        //    'mensagem' => 'Livros encontrados',
        //    'livro' => $livros
        //], 202);

        return view('livros.index', ['livros' => $livros]);
    }

    public function show($id) {
        $livro = Livro::findOrFail($id);

        return response()->json([
            'mensagem' => 'Livro encontrado',
            'livro' => $livro
        ], 202);
    }

    //public function edit(Livro $livro){
    //    return view('livros.edit', ['livros' => $livro]);
    //} 

    //public function update(Request $request, $id){
    //    $livro = Livro::findOrFail($id);
//
  //      $livro->titulo = $request->input('titulo');
    //    $livro->descricao = $request->input('descricao');
      //  $livro->autor = $request->input('autor');
        //$livro->preco = $request->input('preco');
        //$livro->quantidade = $request->input('quantidade');

    //    $livro->update();
//
  //      return response()->json([
    //        'mensagem' => 'Livro editado com sucesso!',
      //      'livro' => $livro
        //], 202);
  //  } 
  public function edit(Livro $livro){
    return view('livros.edit', ['livro' => $livro]);
}

public function update(Livro $livro, Request $request) {
    // Validação dos campos
    $request->validate([
        'titulo' => 'required|string',
        'descricao' => 'required|string',
        'autor' => 'required|string',
        'preco' => 'required|numeric',
        'quantidade' => 'required|integer',
    ]);

    // Atualização dos dados
    $livro->titulo = $request->input('titulo');
    $livro->descricao = $request->input('descricao');
    $livro->autor = $request->input('autor');
    $livro->preco = $request->input('preco');
    $livro->quantidade = $request->input('quantidade');

    $livro->save();  // Use save() em vez de update()

    return redirect(route('livros.index'))->with('success', 'Livro atualizado com sucesso!');
}


    public function delete($id){
        $livro = Livro::findOrFail($id);

        $livro->delete();

        //return response()->json([
        //    'mensagem' => 'Livro deletado com sucesso!'
        //]);

        return redirect(route('livros.index'))->with('success', 'Livro excluido com sucesso!');
    }
}
