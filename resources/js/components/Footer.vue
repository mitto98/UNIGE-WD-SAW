<template>
  <footer class="footerbar" >
    <div>
      <span class="text-muted"></span>
    </div>
  </footer>
</template>

<script>
  export default {
    name: "Footer"
  }
</script>

<style scoped lang="scss">
  @import "../../sass/variables";

  .footerbar {
    background-color: $primary-blu;
    height: 60px;
    bottom: 0;
    width: 100%;
    line-height: 60px;
  }
</style>
