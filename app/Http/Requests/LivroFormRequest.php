<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class LivroFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules()
    {
        return [
            'preco' => 'required|numeric',
            'quantidade' => 'numeric',
            'titulo' => 'required'
        ];
    }

    public function messages()
    {
        return [
            'preco.required' => "Voce deve colocar algum valor para o livro!",
            'preco.numeric' => "Valor do livro deve ser um numero!",
            'titulo.required' => "Não deixe seu livro sem titulo!",
            'quantidade.numeric' => "A quantidade deve ser um numero!"
        ];
    }
}
