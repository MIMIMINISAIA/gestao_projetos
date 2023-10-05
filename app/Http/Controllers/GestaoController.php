<?php

namespace App\Http\Controllers;

use App\Http\Requests\GestaoFormRequest;
use App\Models\gestao;
use Illuminate\Http\Request;

class GestaoController extends Controller
{
    public function store(GestaoFormRequest $request){
        $gestao = gestao::create([
            'titulo' => $request->titulo,
            'descricao' => $request->descricao,
            'data_inicio'=>$request->data_inicio,
            'data_termino'=>$request->data_termino,
            'valor_projeto'=>$request->valor_projeto,
            'status'=>$request->status,
        ]);

        return response()->json([
            "succes" => true,
            "message" =>"projeto gravado com sucesso",
            "data" => $gestao
        ],200);
    }

    public function update(Request $request){
        $gestao = gestao::find($request->id);
    
        if(!isset($gestao)){
            return response()->json([
                'status' => false,
                'message' => "projeto não encontrado"
            ]);
        }
    
        if(isset($request->titulo)){
            $gestao->titulo = $request->titulo;
        }
        if(isset($request->descricao)){
            $gestao->descricao= $request->descricao;
        }
        if(isset($request->data_inicio)){
            $gestao->data_inicio = $request->data_inicio;
        }
        if(isset($request->data_termino)){
            $gestao->data_termino = $request->data_termino;
        }
        if(isset($request->valor_projeto)){
            $gestao->valor_projeto = $request->valor_projeto;
        }
        if(isset($request->status)){
            $gestao->status = $request->status;
        }
    
    
        $gestao-> update();
    
        return response()->json([
            'status' => true,
            'message' => "projeto atualizado"
        ]);
    
    }

    public function excluir($id){
        $gestao = gestao::find($id);
    
        if(!isset($gestao)){
            return response()->json([
                'status' => false,
                'message' => "projeto não encotrado"
            ]);
        }
    
        $gestao->delete();
    
        return response()->json([
            'status' => true,
            'message' => "projeto excluido com sucesso"
        ]);
    }

    public function pesquisarPorId($id){
        $gestao = gestao::find($id);

        if($gestao == null){
            return response()->json([
                'status'=>false,
                'message'=> "projeto não encontrado"
           ]);

        }
        return response()->json([
            'status'=>true,
            'data'=> $gestao
        ]);
    }

    public function pesquisarPorNome(Request $request){
        $gestaos = gestao::where('titulo', 'like', '%'. $request->titulo . '%')->get();
    
        if(count($gestaos)>0){
            return response()->json([
                'status'=>true,
                'data'=> $gestaos
            ]);
        }
        
        return response()->json([
            'status'=>false,
             'data'=> 'Não há resultados para a pesquisa.'
            ]);
    
    }
}
