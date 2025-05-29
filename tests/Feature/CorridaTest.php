<?php

use App\Models\Corrida;
use App\Models\User;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class CorridaTest extends TestCase
{

    use RefreshDatabase;

public function test_returns_a_successful_response()
{
    $user = User::factory()->create();
    $this->actingAs($user);

    $response = $this->get('/corrida');

    $response->assertStatus(200);
}

public function test_returns_a_successful_response_create()
{
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
}

public function test_returns_a_successful_response_update()
{
    $user = User::factory()->create();
    $this->actingAs($user);

    $corrida = Corrida::create([
        'nome_cliente' => 'João Teste',
        'preco' => 90,
        'data' => '2025-05-28',
    ]);

    $response = $this->put("/corrida/{$corrida->id_corrida}", [
        'nome_cliente' => 'Novo Nome',
        'preco' => 75,
        'data' => '2025-06-01',
    ]);

    $response->assertRedirect('/corrida');

    $this->assertDatabaseHas('corridas', [
        'id_corrida' => $corrida->id_corrida,
        'nome_cliente' => 'Novo Nome',
        'preco' => 75,
        'data' => '2025-06-01',
    ]);
}

public function test_returns_a_successful_response_delete()
{
    $user = User::factory()->create();
    $this->actingAs($user);

    $corrida = Corrida::create([
        'nome_cliente' => 'Novo Nome',
        'preco' => 75,
        'data' => '2025-06-01',
    ]);

    $response = $this->delete("/corrida/{$corrida->id_corrida}");

    $response->assertRedirect('/corrida');

    $this->assertDatabaseMissing('corridas', [
        'id_corrida' => $corrida->id_corrida,
    ]);
}

};
