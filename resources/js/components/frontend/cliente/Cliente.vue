<template>
  <div>
    <search></search>
  </div>
</template>
<script>
import axios from "axios";
import clienteSearch from "./ClienteSearch";
import Modal from "../../../shared/modal/bootstrap/Modal";

export default {
  created() {
    this.loadClientes();
  },
  computed: {
    clientes() {
      return this.$store.state.loadCliente.clientes.data;
    },
  },
  methods: {
    loadClientes() {
      this.$store.dispatch("loadClientes");
    },
  },
  components: {
    search: clienteSearch,
    modal: Modal,
  },
};
</script>