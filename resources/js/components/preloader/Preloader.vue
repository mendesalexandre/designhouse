<template>
  <div>
    <div class="preloader" v-show="preloader">
      <img src="images/preloader.gif" />
    </div>
  </div>
</template>
<script>
export default {
  computed: {
    preloader() {
      return this.$store.state.preloader.loading;
    },
  },
};
</script>
<style scoped>
.preloader {
  /* position: relative;
  width: 100%; */
}
.preloader img {
  position: absolute;
  display: block;
  z-index: 9999;
  transform: translate(-50%, -50%);
  left: 50%;
  top: 50%;
  width: 200px;
  height: 200px;
}
</style>