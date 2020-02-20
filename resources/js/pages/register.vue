<template>
  <div class="im-blue-da-ba-dee">
    <div class="container">
      <div class="row justify-content-center">
        <form class="col-sm-12 col-md-6 col-lg-4" @submit.prevent="register">
          <h1 class=" font-weight-bold text-center text-white">Opinioni UniGe</h1>
          <img src="/img/register.svg" alt="register image" class="mb-2" width="100%">
          <IFTAInput v-model="matricola"
                     id="matricola" type="text" :required="true"
                     :label="$t('register.matricola')" :error="matricolaError"/>
          <IFTAInput v-model="name"
                     id="name" type="text" :required="true"
                     :label="$t('register.name')" :error="nameError"/>
          <IFTAInput v-model="mail"
                     id="email" type="text" :required="true"
                     :label="$t('register.email')" :error="emailError"/>
          <IFTAInput v-model="password"
                     id="password" type="password" :required="true"
                     :label="$t('login.password')"/>
          <IFTAInput v-model="rePassword"
                     id="repassword" type="password" :required="true"
                     :label="$t('register.repw')" :error="reError"/>

          <div v-if="error" class="alert alert-danger alert-dismissible fade show" role="alert">
            {{error}}
            <button type="button" class="close" @click="error = null">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

          <button type="submit" class="btn btn-primary btn-block" :disabled="!isSubmittable || loading">
            <p class="button-text" v-if="!loading">{{$t('register.button')}}</p>
            <spinner v-if="loading"/>
          </button>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
  import {mapActions} from "vuex";
  import IFTAInput from "../components/IFTAInput";
  import axios from "../axios";
  import Spinner from "../components/General/Spinner";

  export default {
    name: "login",
    components: {Spinner, IFTAInput},
    data: () => ({
      matricola: "",
      mail: "",
      name: "",
      password: "",
      rePassword: "",
      error: "",
      loading: false,
    }),
    computed: {
      nameError() {
        if (!(/^[a-zA-Z'-\s]+$/i).test(this.name))
          return "Formato nome non corretto";
      },
      reError() {
        if (this.password !== this.rePassword)
          return "Le password non coincidono";
      },
      emailError() {
        if (/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(this.email))
          return "Formato non corretto";
      },
      matricolaError(string) {
        if (!(/[sS][0-9]{7}$/i).test(this.matricola))
          return "Formato matricola non corretto";
      },
      isSubmittable() {
        if (!(this.matricola && this.mail)) // && this.name
          return false;
        if (!(this.password && this.rePassword))
          return false;
        return !(this.reError || this.emailError || this.matricolaError);
      },
    },
    methods: {
      ...mapActions("user", ["doLogin"]),
      register() {
        this.loading = true;
        axios.post('/api/user/register', {
          registration_number: this.matricola,
          name: this.name,
          email: this.mail,
          password: this.password,
        }).then(response => {
          this.loading = false;
          this.doLogin({email: this.mail, password: this.password})
            .then(() => {
              this.$router.push("/");
            });
        }).catch(error => {
          this.loading = false;
          if (error.response.status === 422)
            this.error = Object.entries(error.response.data.errors)[0][1][0];
        });
      }
    }
  }
</script>

<style scoped>

  .button-text{
    margin-bottom: 0;
  }

</style>
