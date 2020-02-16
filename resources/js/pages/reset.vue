<template>
  <div class="im-blue-da-ba-dee">
    <div class="container">
      <div class="row justify-content-center">
        <form class="col-sm-12 col-md-6 col-lg-4">
          <h1 class=" font-weight-bold text-center text-white">Opinioni</h1>
          <img src="/img/recupero.png" alt="login image" class="mb-2" width="100%">
          <IFTAInput v-model="username" id="username" type="text" :label="$t('login.username')"/>
          <button type="button" class="btn btn-primary btn-block">{{$t('login.reset')}}</button>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
  import IFTAInput from "../components/IFTAInput";
  export default {
    name: "reset",
    components: {IFTAInput}
  }
</script>
