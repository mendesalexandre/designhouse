<template>
  <div>
    <h1>Cadastro de Cliente</h1>
    <div class="card">
      <div class="card-body">
        <form @submit.prevent="submitForm">
          <div class="form-row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="inputNome">Nome</label>
                <input
                  type="text"
                  class="form-control"
                  id="inputNome"
                  aria-describedby="emailHelp"
                  v-model="nome"
                />
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="inputSobrenome">Sobrenome</label>
                <input
                  type="text"
                  class="form-control"
                  id="inputSobrenome"
                  v-model="sobrenome"
                />
              </div>
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="inputCpfCnpj">CPF/CNPJ</label>
                <input
                  type="text"
                  class="form-control"
                  id="inputCpfCnpj"
                  v-model="cpf_cnpj"
                />
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="inputEmail">E-mail</label>
                <input
                  type="text"
                  class="form-control"
                  id="inputEmail"
                  v-model="email"
                />
              </div>
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="inputProfissao">Profissão</label>
                <input
                  type="text"
                  class="form-control"
                  id="inputProfissao"
                  v-model="profissao"
                />
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="inputRg">RG</label>
                <input type="text" class="form-control" id="inputRg" />
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="inputCnh">CNH</label>
                <input
                  type="text"
                  class="form-control"
                  id="inputCnh"
                  v-model="cnh"
                />
              </div>
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="inputCelular">Celular</label>
                <input
                  type="text"
                  class="form-control"
                  id="inputCelular"
                  v-model="celular"
                />
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="inputTelefone">Telefone</label>
                <input
                  type="text"
                  class="form-control"
                  id="inputTelefone"
                  v-model="telefone"
                />
              </div>
            </div>
          </div>
          <div class="form-row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="inputNomeMae">Nome da Mãe</label>
                <input
                  type="text"
                  class="form-control"
                  id="inputNomeMae"
                  v-model="nome_mae"
                />
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="inputNomePai">Nome do Pai</label>
                <input
                  type="text"
                  class="form-control"
                  id="inputNomePai"
                  v-model="nome_pai"
                />
              </div>
            </div>
          </div>
          <button type="submit" class="btn btn-primary">Salvar</button>
        </form>
      </div>
    </div>
  </div>
</template >
    <script>
import axios from "axios";
export default {
  data() {
    return {
      nome: "",
      sobrenome: "",
      telefone: "",
      email: "",
      cpf_cnpj: "",
      email: "",
      observacao: "",
      nome_mae: "",
      nome_pai: "",
      celular: "",
      profissao: "",
      cnh: "",
    };
  },
  methods: {
    submitForm() {
      this.$store.dispatch("storeCliente", {
        nome: this.nome,
        sobrenome: this.sobrenome,
        email: this.email,
        cpf_cnpj: this.cpf_cnpj,
        observacao: this.observacao,
        nome_mae: this.nome_mae,
        nome_pai: this.nome_pai,
        celular: this.celular,
        profissao: this.profissao,
        cnh: this.cnh,
      });
    },
  },
};
</script>