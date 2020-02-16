<template>
  <div class="im-blue-da-ba-dee">
    <div class="container">
      <div class="row justify-content-center">
        <form class="col-sm-12 col-md-6 col-lg-4" @submit.prevent="login">
          <h1 class=" font-weight-bold text-center text-white">Opinioni</h1>
          <img src="/img/estudiantes.png" alt="login image" class="mb-2" width="100%">
          <IFTAInput v-model="username" id="username" type="text" :label="$t('login.username')" :required="true"/>
          <IFTAInput v-model="password" id="password" type="password" :label="$t('login.password')" :required="true"/>

          <div v-if="error" class="alert alert-danger alert-dismissible fade show" role="alert">
            {{error}}
            <button type="button" class="close" @click="error = null">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <button type="submit" class="btn btn-primary btn-block">{{$t('login.login')}}</button>
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

  export default {
    name: "login",
    components: {IFTAInput},
    data: () => ({
      username: "",
      password: "",
      error: null
    }),
    methods: {
      ...mapActions("user", ["doLogin"]),
      login() {
        this.doLogin( {
          email: this.username,
          password: this.password
        }).then(() => {
          this.$router.push("/");
        }).catch(error => {
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

</style>
