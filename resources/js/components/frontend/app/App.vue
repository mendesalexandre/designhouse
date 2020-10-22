<template>
  <div>
    <div class="menu_sidebar">
      <div class="menu">
        <ul>
          <li>
            <router-link :to="{ name: 'home' }">Home</router-link>
          </li>
          <li>
            <!-- <a href="">Meus Agendamento</a> -->
            <router-link :to="{ name: 'appointments' }"
              >Meus Agendamentos</router-link
            >
          </li>
          <li>
            <router-link :to="{ name: 'custas' }"
              >Tabela de Custas ({{ totalCustas }})</router-link
            >
          </li>
          <li>
            <router-link :to="{ name: 'cliente.index' }">Clientes </router-link>
          </li>

          <li>
            <router-link :to="{ name: 'cliente.index' }"
              >Ordem de Serviço
            </router-link>
          </li>
        </ul>
      </div>
    </div>
    <div class="content">
      <div class="content_area">
        <router-view></router-view>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  computed: {
    totalCustas() {
      return this.$store.state.custas.items.data.length;
    },
  },
};
</script>