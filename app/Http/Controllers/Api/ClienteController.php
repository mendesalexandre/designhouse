<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUpdateCliente;
use App\Models\Api\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    protected $cliente;

    public function __construct(Cliente $cliente)
    {
        $this->cliente = $cliente;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clientes = $this->cliente->all();
        // $clientes = $this->cliente->all('id', 'nome', 'sobrenome');

        return response()->json(['data' => $clientes]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $rules = [
            'tipo_pessoa_id' => 'required|integer|max:30',
            'endereco_id' => 'required|integer|max:30',
            'ativo' => 'required|max:5',
            'nome' => 'required|max:100',
            'cpf_cnpj' => 'required|max:14',
            'email' => 'required|email',
        ];

        $messages = [
            'nome.required' => 'O campo nome é obrigatório',
            'cpf_cnpj.required' => 'Por favor, informar CPF/CNPJ'
        ];

        $data = [
            'tipo_pessoa_id' => $request->tipo_pessoa_id,
            'endereco_id' => $request->endereco_id,
            // 'ativo' => $request->ativo,
            'ativo' => 1,
            'nome' => $request->nome,
            'cpf_cnpj' => $request->cpf_cnpj,
            'email' => $request->email,
            'observacao' => $request->observacao,
            'nome_mae' => $request->nome_mae,
            'nome_pai' => $request->nome_pai,
            'celular' => $request->celular,
            'profissao' => $request->profissao,
            'cnh' => $request->cnh,
            'rg' => $request->rg,
        ];

        $request->validate($rules);

        // if (in_array('', $data)) {
        //     return response()->json(['error' => 'Por favor, preencha todos os campos.']);
        // }

        $this->cliente->create($data);

        return response()->json(['success' => 'Dados inseridos com sucesso!']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function pdf($id)
    {
        $cliente = $this->cliente->all();

        return \PDF::loadView('site.certificate.certificate', compact('cliente'))
            // Se quiser que fique no formato a4 retrato: ->setPaper('a4', 'landscape')
            ->download('nome-arquivo-pdf-gerado.pdf');
    }

    public function searchIndicadorPessoal(Request $request)
    {
        $error = ['error' => 'Nenhum resultado encontrado, Tente novamente com palavras diferente.'];

        if ($request->has('nome')) {
            $nome = $request->get('nome');
            $posts = $this->cliente->where('nome', 'like', "{$nome}%")->orderBy('nome')->get();

            return $posts->count() ? $posts : $error;
        }

        if ($request->has('nome_consulta_fonetica')) {
            $nome_consulta_fonetica = $request->get('nome_consulta_fonetica');
            $posts = $this->cliente->where('nome', 'like', "%{$nome_consulta_fonetica}%")->orderBy('nome')->get();

            return $posts->count() ? $posts : $error;
        }


        if ($request->has('cpf_cnpj')) {
            $cpf_cnpj = $request->get('cpf_cnpj');
            $posts = $this->cliente->where('cpf_cnpj', 'like', "%{$cpf_cnpj}%")->get();

            // return $this->cliente->where('nome', 'like', "%{$nome}%")->get();
            return $posts->count() ? $posts : $error;
        }

        if ($request->has('sobrenome')) {
            $sobrenome = $request->get('sobrenome');
            $posts = $this->cliente->where('sobrenome', 'like', "%{$sobrenome}%")->get();

            // return $this->cliente->where('nome', 'like', "%{$nome}%")->get();
            return $posts->count() ? $posts : $error;
        }

        if ($request->has('ficha')) {
            $ficha = $request->get('ficha');
            $posts = $this->cliente->where('id', "{$ficha}")->get();

            return $posts->count() ? $posts : $error;
        }
    }
}
