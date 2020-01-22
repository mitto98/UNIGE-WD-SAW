<template>
  <nav class="navbar navbar-expand-lg navbar-dark">
    <a class="navbar-brand" href="#">
      <logo_mugugno :colored="false" width_logo="170px" heigth_logo="70px" />
    </a>
    <div class="align-bottom-right">
      <v-btn icon text x-large v-on:click="showMenuModal">
        <v-icon large color="#ffffff" >mdi-magnify</v-icon>
      </v-btn>
      <v-btn text rounded color="#ffffff" x-large v-on:click="showMenuModal">
        <v-icon large color="#ffffff">mdi-web</v-icon>
        ITA/EN
      </v-btn>
      <v-btn icon text color="#ffffff"  x-large v-on:click="showMenuModal">
        <v-icon color="#ffffff" >mdi-account</v-icon>
      </v-btn>
    </div>
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
    </div>
  </nav>
</template>

<script>
  import Logo from "./Logo"
  import Logo_mugugno from "./Logo_mugugno"
  export default {
    components : {
      Logo,
      Logo_mugugno
    },
    name: "Navbar",
    methods:{
      showMenuModal: function (event) {
        console.log(event)
      }
    }
  }
</script>

<style scoped lang="scss">
  @import "../../sass/_variables.scss";

  .nav-link{
    color:white
  }
  .navbar{
    background-color: #002677;
    display: flex;
    padding: 8px;

  }
  .button{
    border-color: $primary-blu;
  }
  .align-bottom-right{
    margin-left: auto ;
  }

</style>
