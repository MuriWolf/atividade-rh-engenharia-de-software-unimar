<?php

use App\Models\Departamento;
use App\Models\Funcionario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Symfony\Component\Console\Input\Input;

Route::post('/departamento', function (Request $request) {
    $departamento = new Departamento();
    $departamento->nome = $request->input('nome');
    $departamento->save();

    return response()->json($departamento);
});

Route::get('/departamentos', function () {
    $departamentos = Departamento::all();

    return response()->json($departamentos);
});

Route::get('/departamento/{id}', function ($id) {
    $departamento = Departamento::find($id);

    return response()->json($departamento);
});

Route::patch('/departamento/{id}', function (Request $request, $id) {
    $departamento = Departamento::find($id);

    if ($request->input('nome') !== null) {
        $departamento->nome = $request->input('nome');
    }
    $departamento->save();

    return response()->json($departamento);
});

Route::delete('/departamento/{id}', function ($id) {
    $departamento = Departamento::find($id);
    $departamento->delete();

    return response()->json($departamento);
});

Route::post('/funcionario', function (Request $request) {
    $funcionario = new Funcionario();
    $funcionario->nome = $request->input('nome');
    $funcionario->email = $request->input('email');
    $funcionario->departamento_id = $request->input('departamento_id');
    $funcionario->save();

    return response()->json($funcionario);
});

Route::get('/funcionarios', function () {
    $funcionarios = Funcionario::all();

    return response()->json($funcionarios);
});

Route::get('/funcionario/{id}', function ($id) {
    $funcionario = Funcionario::find($id);

    return response()->json($funcionario);
});

Route::patch('/funcionario/{id}', function (Request $request, $id) {
    $funcionario = Funcionario::find($id);

    if ($request->input('nome') !== null) {
        $funcionario->nome = $request->input('nome');
    }
    if ($request->input('email') !== null) {
        $funcionario->email = $request->input('email');
    }
    if ($request->input('departamento_id') !== null) {
        $funcionario->departamento_id = $request->input('departamento_id');
    }

    $funcionario->save();

    return response()->json($funcionario);
});

Route::delete('/funcionario/{id}', function ($id) {
    $funcionario = Funcionario::find($id);
    $funcionario->delete();

    return response()->json($funcionario);
});

Route::get('/funcionarios/departamentos', function () {
    $funcionarios = Funcionario::with("departamento")->get();

    return response()->json($funcionarios);
});

Route::get('departamentos/funcionarios', function () {
    $funcionarios = Departamento::with('funcionarios')->get();

    return response()->json($funcionarios);
});

Route::get('/funcionario/departamento/{id}', function ($id) {
    $funcionario = Funcionario::find($id);
    $departamento_id = $funcionario->departamento_id;
    $departamento = Departamento::find($departamento_id);

    return response()->json($departamento);
});

Route::get('/departamento/funcionarios/{id}', function ($id) {
    $funcionarios = Departamento::find($id)->funcionarios;

    return response()->json($funcionarios);
});
