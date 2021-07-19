<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tarefa extends Model
{
     protected $fillable = ['tarefa','concluido','data_tarefa'];
}
