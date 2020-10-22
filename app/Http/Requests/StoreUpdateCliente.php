<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateCliente extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'tipo_pessoa_id' => 'required|integer|max:30',
            'endereco_id' => 'required|integer|max:30',
            // 'ativo' => $request->ativo,
            'ativo' => 'required|max:5',
            'nome' => 'required|max:100',
            'cpf_cnpj' => 'required|max:14',
            'email' => 'required|email',
        ];
    }
}
