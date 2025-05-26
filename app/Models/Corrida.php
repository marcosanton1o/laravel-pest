<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Corrida extends Model
{
    use HasFactory,  Notifiable;

    protected $table = 'Corrida';
    protected $primaryKey = 'id_corrida';

    protected $fillable = [
        'id_corrida',
        'data',
        'preco',
        'nome_cliente',
    ];
}
