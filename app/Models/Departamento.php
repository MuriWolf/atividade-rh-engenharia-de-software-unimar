<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    protected $table = 'departamento';
    protected $fillable = ['nome'];

    public function funcionarios() {
        return $this->hasMany(
            Funcionario::class,
            'departamento_id',
            'id');
    }
}
