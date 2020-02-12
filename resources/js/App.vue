<template>
  <div>
    <navbar/>
    <router-view class="pb-4" style="min-height: calc(100vh - 164px);"/>
    <Footer/>
  </div>
</template>

<script>
  import Navbar from "./components/Navbar";
  import Footer from "./components/Footer";

  export default {
    name: "App",
    components: {Footer, Navbar}
  }
</script>

<style lang="scss">
  $border-radius: 0;
  @import "../sass/_variables.scss";
  @import "~bootstrap/scss/bootstrap.scss";
  @import url('https://fonts.googleapis.com/css?family=Fira+Sans|Roboto+Slab&display=swap');

  body {
    font-family: 'Fira Sans', sans-serif;
  }

  .im-blue-da-ba-dee {
    background-color: $primary-blu;
  }
</style>
