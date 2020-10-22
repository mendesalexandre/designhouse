<template>
  <div>
    <div class="card">
      <h1 class="card-title">LIVRO 05 - INDICADOR PESSOAL</h1>
      <div class="card-header">
        <form>
          <div class="form-row">
            <div class="col-md-3">
              <select name="" class="form-control" v-model="tipo_busca">
                <option value="nome">Nome</option>
                <option value="sobrenome">Sobrenome</option>
                <option value="nome_consulta_fonetica">
                  Consulta Fonética
                </option>
                <option value="cpf_cnpj">CPF/CNPJ</option>
                <option value="cpf_cnpj_aproximacao">
                  CPF/CNPJ Aproximação
                </option>
                <option value="rg_ie">RG/IE</option>
                <option value="ficha">Nr. da Ficha</option>
              </select>
            </div>
            <div class="col-md-6">
              <input
                type="text"
                name="cliente"
                id="cliente"
                class="form-control"
                placeholder="Digite a sequencia a procurar"
                v-model="filter"
              />
            </div>
            <div class="col-md-3">
              <div class="search_btn">
                <button
                  type="submit"
                  class="btn btn-primary"
                  @click.prevent="searchIndicadorPessoal"
                >
                  Pesquisar
                </button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
    <div class="resultado_indicador_pessoal" v-if="filters.length > 0">
      <div class="card">
        <div class="card-body">
          <table class="table table-hover table-bordered">
            <thead>
              <tr>
                <th>N. Ficha</th>
                <th>Nome</th>
                <th>E-mail</th>
                <th>CPF/CNPJ</th>
              </tr>
            </thead>
            <tbody>
              <tr v-for="(cliente, index) in filters" :key="index">
                <td>{{ cliente.id }}</td>
                <td>{{ cliente.nome }}</td>
                <td>{{ cliente.email }}</td>
                <td>{{ cliente.cpf_cnpj }}</td>
                <td>
                  <router-link to="" class="btn btn-primary">Abrir</router-link>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import axios from "axios";
export default {
  props: ["query"],
  data() {
    return {
      filter: "",
      filters: [],
      tipo_busca: "nome",
    };
  },
  watch: {
    query() {
      this.searchIndicadorPessoal();
    },
  },
  methods: {
    searchIndicadorPessoal() {
      if (this.query === "" && this.query.length < 3) {
        this.filters = [];
        return false;
      }
      axios
        .get(`/api/v1/cliente/indicador?${this.tipo_busca}=${this.filter}`)
        .then((response) => {
          this.filters = response.data;
        });
    },
  },
};
</script>