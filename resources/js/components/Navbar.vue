<template>
  <nav class="navbar navbar-expand-lg navbar-dark">

    <a class="navbar-brand" href="/">
      <logo :colored="false" width_logo="170px" heigth_logo="70px"/>
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"/>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
          <a class="nav-link" href="/">Home <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Link</a>
        </li>
        <!-- TODO rimettere i bottoni e fa -->
        <!--      <v-btn class="btn btn-primary" icon text x-large v-on:click="showMenuModal">-->
        <!--        <v-icon large color="#ffffff">mdi-magnify</v-icon>-->
        <!--      </v-btn>-->
        <!--      <v-btn text rounded color="#ffffff" x-large v-on:click="showMenuModal">-->
        <!--        <v-icon large color="#ffffff">mdi-web</v-icon>-->
        <!--        ITA/EN-->
        <!--      </v-btn>-->
        <!--      <v-btn icon text color="#ffffff" x-large v-on:click="showMenuModal">-->
        <!--        <v-icon color="#ffffff">mdi-account</v-icon>-->
        <!--      </v-btn>-->
      </ul>
    </div>
  </nav>
</template>

<script>
  import Logo from "./Logo"

  export default {
    components: {Logo},
    name: "Navbar",
    methods: {
      showMenuModal: function (event) {
        console.log(event)
      }
    }
  }
</script>

<style scoped lang="scss">
  @import "../../sass/_variables.scss";

  .nav-link {
    color: white
  }

  .navbar {
    background-color: $primary-blu;
    display: flex;
    padding: 8px;

  }

  .button {
    border-color: $primary-blu;
  }

  .align-bottom-right {
    margin-left: auto;
  }

</style>
