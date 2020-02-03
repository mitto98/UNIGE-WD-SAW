<template>
  <div>
    <navbar/>
    <router-view class="pb-4" style="height: calc(100vh - 158px);"/>
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
  @import "~bootstrap/scss/bootstrap.scss";
  @import url('https://fonts.googleapis.com/css?family=Fira+Sans|Roboto+Slab&display=swap');

  body {
    font-family: 'Fira Sans', sans-serif;
  }
</style>
