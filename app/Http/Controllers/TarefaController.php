<?php

namespace App\Http\Controllers;

use App\Mail\TarefaEmail;
use App\Tarefa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;

class TarefaController extends Controller
{

    public function concluido(Request $request,Tarefa $tarefa){

        if ($request->concluido == 'sim'){
            $tarefa->data_conclusao = date('Y-m-d');
        }
        $tarefa->concluido = $request->concluido;
        $tarefa->save();
        return response()->json($tarefa);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $tarefas =  Tarefa::select('tarefa','concluido','id',DB::raw('DATE_FORMAT(data_conclusao,\'%d/%m/%Y\')as data_conclusao'))->paginate(20);

       return response()->json($tarefas);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $tarefa =  Tarefa::create([
          'tarefa'=> $request->tarefa,
        ]);
        return response()->json($tarefa);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Tarefa  $tarefa
     * @return \Illuminate\Http\Response
     */
    public function show(Tarefa $tarefa)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Tarefa  $tarefa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tarefa $tarefa)
    {

        $tarefa->fill($request->all());
        $tarefa->save();
        Mail::send(new TarefaEmail('atualizar tarefa'));
        return response()->json($tarefa);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Tarefa  $tarefa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tarefa $tarefa)
    {
        $tarefa->delete();
        return response()->json($tarefa);
    }
}
