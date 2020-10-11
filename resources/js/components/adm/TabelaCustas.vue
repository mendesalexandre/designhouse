<template>
  <div>
    <h1>Tabela de Custas</h1>
    <table class="table table-hover table-bordered">
      <thead>
        <tr>
          <th>ID</th>
          <th>Descrição</th>
          <th>Ações</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="(custa, index) in custas.data" :key="index">
          <td>{{ custa.id }}</td>
          <td>{{ custa.descricao }}</td>
          <td>
            <router-link :to="{ name: 'custas' }" class="btn btn-primary"
              >Editar</router-link
            >
            <router-link :to="{ name: 'custas' }" class="btn btn-primary"
              >Desativar</router-link
            >
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</template>

<script>
import axios from "axios";

export default {
  created() {
    this.loadCustas();
  },
  data() {
    return {
      custas: [],
    };
  },
  methods: {
    loadCustas() {
      axios
        .get("http://localhost/projetos/laravel/mjsistema/public/api/v1/custas")
        .then((response) => {
          this.custas = response.data;
        })
        .catch((error) => {});
    },
  },
};
</script>