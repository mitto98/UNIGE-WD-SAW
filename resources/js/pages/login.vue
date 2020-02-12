<template>
  <div class="im-blue-da-ba-dee">
    <div class="container">
      <div class="row justify-content-center">
        <form class="col-sm-12 col-md-6 col-lg-4" @submit.prevent="login">
          <h1 class=" font-weight-bold text-center text-white">Mugugno</h1>
          <img src="/img/estudiantes.png" alt="login image" class="mb-2" width="100%">
          <div class="form-group">
            <input type="text" v-model="username" class="form-control" :placeholder="$t('login.username')" autofocus>
          </div>
          <div class="form-group">
            <input type="password" v-model="password" class="form-control" :placeholder="$t('login.password')">
          </div>

          <div v-if="error" class="alert alert-danger alert-dismissible fade show" role="alert">
            {{error}}
            <button type="button" class="close" @click="error = null">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

          <button type="submit" class="btn btn-primary btn-block">{{$t('login.login')}}</button>

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

  export default {
    name: "login",
    data: () => ({
      username: "",
      password: "",
      error: null
    }),
    methods: {
      ...mapActions("user", ["doLogin"]),
      login() {
        this.doLogin({
          email: this.username,
          password: this.password
        }).then(() => {
          this.$router.push("/");
        }).catch(error => {
          if(error.response.data.error === "invalid_grant") {
            this.error = this.$t("login.invalid")
          }
        });
      }
    }
  }
</script>
