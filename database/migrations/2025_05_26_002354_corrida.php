<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()

    {

        Schema::create('Corrida', function (Blueprint $table) {

            $table->id('id_corrida');
            $table->dateTime('data');
            $table->decimal('preco', 10, 2);
            $table->string('nome_cliente', 150);

            $table->timestamps();

        });

    }


    public function down()

    {

        Schema::dropIfExists('Corrida');

    }

};
