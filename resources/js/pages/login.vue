<template>
  <div class="im-blue-da-ba-dee">
    <div class="container">
      <div class="row justify-content-center">
        <form class="col-sm-12 col-md-6 col-lg-4" @submit.prevent="login">
          <h1 class=" font-weight-bold text-center text-white">Opinioni UniGe</h1>
          <img src="/img/login.svg" alt="login image" class="mb-2" width="100%">
          <IFTAInput v-model="username" id="username" type="text" :label="$t('login.username')" :required="true"/>
          <IFTAInput v-model="password" id="password" type="password" :label="$t('login.password')" :required="true"/>

          <div v-if="error" class="alert alert-danger alert-dismissible fade show" role="alert">
            {{error}}
            <button type="button" class="close" @click="error = null">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <button type="submit" class="btn btn-primary btn-block" :disabled="loading">
            <p v-if="!loading" class="button-text">{{$t('login.login')}}</p>
            <spinner v-if="loading"/>
          </button>
          <p class="between-btn">Oppure</p>

          <router-link :to="{name: 'register'}" class="btn btn-secondary btn-sm btn-block text-white">
            {{ $t('register.button') }}
          </router-link>
          <router-link :to="{name: 'reset'}" class="btn btn-link btn-sm btn-block text-white">
            {{ $t('login.forgot_pw') }}
          </router-link>
          <router-link :to="{name: 'help'}" class="btn btn-link btn-sm btn-block text-white">
            {{ $t('login.help') }}
          </router-link>
          <router-link :to="{name: 'gdpr'}" class="btn btn-link btn-sm btn-block text-white">
            {{ $t('login.gdpr') }}
          </router-link>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
  import {mapActions} from "vuex";
  import IFTAInput from "../components/IFTAInput";
  import Spinner from "../components/General/Spinner";

  export default {
    name: "login",
    components: {Spinner, IFTAInput},
    data: () => ({
      username: "",
      password: "",
      error: null,
      loading:false
    }),
    methods: {
      ...mapActions("auth", ["doLogin"]),
      login() {
        this.loading = true;
        this.doLogin( {
          email: this.username,
          password: this.password
        }).then(() => {
          this.loading = false;
          this.$router.push("/");
        }).catch(error => {
          this.loading = false;
          if (error.response.data.error === "invalid_grant") {
            this.error = this.$t("login.invalid")
          }
        });
      }
    }
  }
</script>
<style scoped lang="scss">

  .between-btn {
    color: white;
    text-align: center;
    font-size: .75rem;
    margin-top: .85rem;
    margin-bottom: .85rem;
  }
  .button-text{
    margin-bottom: 0;
  }

</style>
