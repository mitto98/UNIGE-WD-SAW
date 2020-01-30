<template>
  <div>
    <navbar/>
<!--    <h1>Vue Router Demo App</h1>

    <p>
      <router-link :to="{ name: 'index' }">Home</router-link>
      |
      <router-link :to="{ name: 'hello' }">Hello World</router-link>
    </p>-->

    <div>
      <router-view/>
    </div>
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
</style>
