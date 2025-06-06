<?php
use App\Http\Requests\StoreCorridaRequest;
use Illuminate\Support\Facades\Validator;

it('valida os campos obrigatórios da StoreCorridaRequest', function () {
    $dados = [
        // dados ausentes para forçar falha
    ];

    $request = new StoreCorridaRequest();

    $validator = Validator::make($dados, $request->rules());

    expect($validator->fails())->toBeTrue();
    expect($validator->errors()->has('nome_cliente'))->toBeTrue();
    expect($validator->errors()->has('data'))->toBeTrue();
    expect($validator->errors()->has('preco'))->toBeTrue();
});

it('passa na validação com dados corretos', function () {
    $dados = [
        'nome_cliente' => 'Madona',
        'data' => '2025-06-06',
        'preco' => 45.50,
    ];

    $request = new StoreCorridaRequest();

    $validator = Validator::make($dados, $request->rules());

    expect($validator->fails())->toBeFalse();
});
