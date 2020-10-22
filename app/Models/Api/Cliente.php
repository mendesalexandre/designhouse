<?php

namespace App\Models\Api;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table = 'cliente';
    protected $fillable = [
        'tipo_pessoa_id',
        'endereco_id',
        'ativo',
        'nome',
        'sobrenome',
        'cpf_cnpj',
        'email',
        'observacao',
        'telefone',
        'nome_mae',
        'nome_pai',
        'celular',
        'profissao',
        'cnh',
        'rg',
    ];

    protected $dates = ['updated_at', 'created_at'];

    // public function getTransactionDateAttribute($value)
    // {
    //     return Carbon::parse($value)->format('d/m/Y');
    // }

    // public function setTransactionDateAttribute($value)
    // {
    //     return Carbon::parse($value)->format('d/m/Y');
    // }

    public function getCreatedAtFmtBrAttribute()
    {
        return date('d/m/Y', strtotime($this->created_at));
    }
}
