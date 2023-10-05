<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class GestaoFormRequest extends FormRequest
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
    public function rules(): array
    {
        return [
            
                'titulo' => 'required|max:120|min:5',
                'descricao' => 'required|max:200|min:10',
                'data_inicio'=> 'required|date',
                'data_termino'=>'required|date',
                'valor_projeto'=>'required|decimal:2',
                'status'=>'required',
            
        ];
    }

    
    public function failedValidation(Validator $validator){
        throw new HttpResponseException(response()->json([
            'sucess' => false,
            'error' => $validator->errors()
        ]));
    }

    public Function messages(){
        return [
            'titulo.required'=> 'O campo nome é obrigatorio',
            'titulo.max' => 'o campo deve conter no maximo 120 caracteres',
            'titulo.min' => 'o campo dever conter no minimo 5 caracteres',
            'descricao.required' =>'Descrição obrigatoria',
            'descricao.max' => 'Descrição deve conter no maximo 200 caracteres',
            'descricao.min' => 'Descrição deve conter no minimo 10 caracteres',
            'data_inicio.required' => 'Data obrigatoria',
            'data_inicio.date' => 'Formato invalido',
            'data_termino.required' => 'Data obrigatoria',
            'data_termino.date' => 'Formato invalido',
            'valor_projeto.decimal' => 'formato invalido',
            'valor_projeto.required' => 'valor obrigatorio',
            'status.required' => 'status obrigatorio',
            
    
        ];
    }
}
