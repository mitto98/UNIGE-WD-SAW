<template>
  <div class="container  pt-5 pb-4">
    <h2 class="margin-title">Dettaglio utente</h2>
    <div class="row " v-if="user">
      <div class="col-4 col-sm-4 margin-center">
        <p>{{$t('register.icon')}} :</p>
      </div>
      <div class="col-8 col-sm-8 gravatar gravatar-round" >
        <v-gravatar :email="this.user.email" />
      </div>
      <div class="col-4 col-sm-4">
        <p>{{$t('register.name')}} : </p>
      </div>
      <div class="col-8 col-sm-8">
        <p>{{this.user.name}}</p>
      </div>
      <div class="col-4 col-sm-4">
        <p>{{$t('register.matricola')}} : </p>
      </div>
      <div class="col-8 col-sm-8">
        <p>{{this.user.registration_number}}</p>
      </div>
      <div class="col-4 col-sm-4">
        <p>{{$t('register.email')}} : </p>
      </div>
      <div class="col-8 col-sm-8">
        <p>{{this.user.email}}</p>
      </div>
    </div>
    <spinner v-else class="large-spinner"/>
  </div>
</template>

<script>
  import Spinner from "../components/General/Spinner";
  import {mapGetters} from "vuex";

  export default {
    name: "UserDetails",
    components: {Spinner},
    computed: {
      ...mapGetters(["user"]),
    },
    data: () => ({
    }),
    created(){
    }
  }
</script>

<style scoped lang="scss">

  @import "../../sass/variables";

  .large-spinner{
    color: $primary-blu !important;
    font-size: 5rem;
  }
  p{
    font-size: 1.25rem;
  }
  .margin-title{
    margin-bottom: 1.5rem;
  }

  .margin-center{
    margin-bottom: auto;
    margin-top: auto;
  }
  .gravatar{
    margin-bottom: 20px; border-radius: 50%
  }
</style>
