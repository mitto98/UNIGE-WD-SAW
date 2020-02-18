<template>
  <div class="im-blue-da-ba-dee">
    <div class="container">
      <div class="row justify-content-center">
        <form class="col-sm-12 col-md-6 col-lg-4" @submit.prevent="doReset">
          <h1 class=" font-weight-bold text-center text-white">Opinioni UniGe</h1>
          <img src="/img/reset.svg" alt="reset password image" class="mb-2" width="100%">

          <div v-if="!error">
            <IFTAInput v-model="password" id="username" type="password" :label="$t('login.password')" :required="true"/>
            <IFTAInput v-model="rePassword" id="username" type="password" :label="$t('register.repw')" :required="true"
                       :error="reError"/>

            <button type="submit" class="btn btn-primary btn-block" :disabled="!canSubmit">
              <spinner v-if="loading"/>
              <span v-else>{{$t('login.reset')}}</span>
            </button>
          </div>
          <error :error="error"/>

        </form>
      </div>
    </div>
  </div>
</template>

<script>
  import IFTAInput from "../components/IFTAInput";
  import Spinner from "../components/General/Spinner";
  import Error from "../components/General/Error";
  import axios from "../axios";

  export default {
    name: "doReset",
    components: {Error, Spinner, IFTAInput},
    data: () => ({
      loading: false,
      password: "",
      rePassword: "",
      error: null,
    }),
    computed: {
      canSubmit() {
        if (!!this.reError) return false;
        return (!!this.password & !this.loading);
      },
      reError() {
        if (this.password !== this.rePassword)
          return "Le password non coincidono";
      },
    },
    created() {
      this.loading = true;
      axios.get(`/api/user/reset/${this.$route.params.key}`)
        .catch(error => {
          if (error.response.status === 404) {
            this.error = error.response.data.message;
          }
          this.error = this.error || 'unknown';
        })
        .finally(() => {
          this.loading = false;
        })
    },
    methods: {
      doReset() {
        this.loading = true;
        axios.post(`/api/user/reset/${this.$route.params.key}`, {
          password: this.password,
        })
          .then(() => {
            this.$router.push("/");
          })
          .catch(error => {
            if (error.response.status === 404) {
              this.error = error.response.data.message;
            }
            this.error = this.error || 'unknown';
          })
          .finally(() => {
            this.loading = false;
          })
      }
    }
  }
</script>
