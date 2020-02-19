<template>
  <div>
    <navbar/>
    <router-view class="pb-4" style="min-height: calc(100vh - 164px);"/>
    <Footer/>
  </div>
</template>

<script>
  import {mapActions} from "vuex";
  import Navbar from "./components/Navbar";
  import Footer from "./components/Footer";

  export default {
    name: "App",
    components: {Footer, Navbar},
    created() {
      this.init();
    },
    methods: {
      ...mapActions(['init']),
    }
  }
</script>

<style lang="scss">
  $border-radius: 0;
  $border-radius-sm: 0;
  @import "../sass/_variables.scss";
  @import "~bootstrap/scss/bootstrap.scss";
  @import url('https://fonts.googleapis.com/css?family=Fira+Sans|Roboto+Slab&display=swap');

  body {
    font-family: 'Fira Sans', sans-serif;
  }

  .im-blue-da-ba-dee {
    background-color: $primary-blu;
  }

  .h1-mugugno {
    color: $primary-blu;
  }

  .align-in-row {
    display: flex;
    flex-direction: row;
  }

  .padding-md {
    padding: 1.25rem;
  }

  .btn-mugugno-primary {
    background-color: $primary-blu;
    color: #ffffff;

    &:hover {
      animation: change-color-blue .3s;
      background-color: $primary-cyan;
      color: #ffffff;
    }
  }
  .btn-mugugno-error {
    background-color: $primary-red;
    color: #ffffff;

    &:hover {
      background-color: orange;
      color: #ffffff;
      animation: change-color-red .3s;
    }
  }

  .gravatar-round img{
    border-radius: 50%;
  }

  @keyframes change-color-blue {
    0% {
      background-color: $primary-blu;
    }
    100% {
      background-color: $primary-cyan;
    }
  }

  @keyframes change-color-red {
    0% {
      background-color: $primary-red;
    }
    100% {
      background-color: orange;
    }
  }

</style>
