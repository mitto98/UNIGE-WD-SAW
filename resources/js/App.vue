<template>
  <div>
    <h1>Vue Router Demo App</h1>

    <p>
      <router-link :to="{ name: 'index' }">Home</router-link>
      |
      <router-link :to="{ name: 'hello' }">Hello World</router-link>
    </p>

    <div class="container">
      <router-view/>
    </div>
  </div>
</template>

<script>
  export default {
    name: "App"
  }
</script>

<style>
  @import '~vuetify/dist/vuetify.min.css';
</style>
