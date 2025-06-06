<?php

use App\Http\Requests\UpdateCorridaRequest;
use Illuminate\Support\Facades\Validator;

it('valida os campos obrigatórios da UpdateCorridaRequest', function () {
    $dados = [
    ];

    $request = new UpdateCorridaRequest();

    $validator = Validator::make($dados, $request->rules());

    expect($validator->fails())->toBeTrue();
    expect($validator->errors()->has('nome_cliente'))->toBeTrue();
    expect($validator->errors()->has('data'))->toBeTrue();
    expect($validator->errors()->has('preco'))->toBeTrue();
});

it('passa na validação com dados válidos em UpdateCorridaRequest', function () {
    $dados = [
        'nome_cliente' => 'Carlos',
        'data' => '2025-06-06',
        'preco' => 80.00,
    ];

    $request = new UpdateCorridaRequest();

    $validator = Validator::make($dados, $request->rules());

    expect($validator->fails())->toBeFalse();
});
