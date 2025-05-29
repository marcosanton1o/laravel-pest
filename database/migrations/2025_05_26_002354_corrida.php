<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()

    {

Schema::create('corridas', function (Blueprint $table) {
    $table->id('id_corrida');
    $table->string('nome_cliente');
    $table->decimal('preco', 8, 2);
    $table->date('data');
    $table->timestamps();
});

    }


    public function down()

    {

        Schema::dropIfExists('corrida');

    }

};
