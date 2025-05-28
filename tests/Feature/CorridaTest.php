<?php

use App\Models\Corrida;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;

uses(RefreshDatabase::class);

test('returns a successful response', function () {
    $user = User::factory()->create();
    $this->actingAs($user);

    $response = $this->get('/corrida');

    $response->assertStatus(200);
    $response->assertStatus(200);
});

test('returns a successful response of create', function () {
    $user = User::factory()->create();
    $this->actingAs($user);

    Corrida::create([
        'nome_cliente' => 'João Teste',
        'preco' => 90,
        'data' => '2025-05-28',
    ]);

    $response = $this->get('/corrida');

    $response->assertStatus(200);
    $response->assertDontSee(__('no corridas found'));
});

test('can update an existing corrida', function () {
    $user = User::factory()->create();
    $this->actingAs($user);

    $corrida = Corrida::create([
        'nome_cliente' => 'Antigo Nome',
        'preco' => 80,
        'data' => '2025-05-27',
    ]);

    $response = $this->put("/corrida/{$corrida->id}", [
        'nome_cliente' => 'Novo Nome',
        'preco' => 100,
        'data' => '2025-06-01',
    ]);

    $response->assertRedirect('/corrida');

    $this->assertDatabaseHas('corridas', [
        'id' => $corrida->id,
        'nome_cliente' => 'Novo Nome',
        'preco' => 100,
        'data' => '2025-06-01',
    ]);
});

test('can delete a corrida', function () {
    $user = \App\Models\User::factory()->create();
    $this->actingAs($user);

    $corrida = \App\Models\Corrida::create([
        'nome_cliente' => 'A Ser Deletado',
        'preco' => 70,
        'data' => '2025-05-25',
    ]);

    $response = $this->delete("/corrida/{$corrida->id}");

    $response->assertRedirect('/corrida');
    $this->assertDatabaseMissing('corridas', ['id' => $corrida->id]);
});
