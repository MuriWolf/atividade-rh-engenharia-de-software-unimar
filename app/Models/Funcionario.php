<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
    protected $table = 'funcionario';
    protected $fillable = ['nome', 'email', 'id_departamento'];

    public function departamento() {
        return $this->belongsTo(
            Departamento::class,
            'departamento_id',
            'id'
        );
    }
    //
}
