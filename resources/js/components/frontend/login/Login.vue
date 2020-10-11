<template>
  <div>
    <title>Faça Login</title>
    <h1>Página de Login</h1>
    <div class="form-group">
      <label for="">E-mail</label>
      <input type="text" name="email" id="email" v-model="email" />
    </div>
    <div class="form-group">
      <label for="">Senha</label>
      <input type="password" name="password" id="password" v-model="password" />
    </div>
    <button type="submit" class="btn btn-primary" @click="entrar">
      Entrar
    </button>
  </div>
</template>

<script>
export default {
  data: function () {
    return {
      email: "",
      password: "",
    };
  },
  methods: {
    entrar: function () {
      alert(
        `Clicou e enviou o e-mail ${this.email} e a senha ${this.password}`
      );
    },
  },
};
</script>