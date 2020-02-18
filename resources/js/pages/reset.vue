<template>
  <div class="im-blue-da-ba-dee">
    <div class="container">
      <div class="row justify-content-center">
        <form class="col-sm-12 col-md-6 col-lg-4" @submit.prevent="askReset">
          <h1 class=" font-weight-bold text-center text-white">Opinioni UniGe</h1>
          <img src="/img/reset.svg" alt="reset password image" class="mb-2" width="100%">
          <div v-if="!sent">
            <IFTAInput v-model="email" id="email" type="text" :label="$t('register.email')" :required="true"
                       :error="emailError"/>

            <error :error="error"/>

            <button type="submit" class="btn btn-primary btn-block" :disabled="!canSubmit">
              <spinner v-if="loading"/>
              <span v-else>{{$t('login.reset')}}</span>
            </button>
          </div>
          <div v-else>
            <h3 class="text-white text-center">{{$t('reset.done')}}</h3>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
  import IFTAInput from "../components/IFTAInput";
  import {faSpinner} from "@fortawesome/free-solid-svg-icons";
  import axios from "../axios";
  import Spinner from "../components/General/Spinner";
  import Error from "../components/General/Error";

  export default {
    name: "reset",
    components: {Error, Spinner, IFTAInput},
    data: () => ({
      email: "",
      sent: false,
      loading: false,
      error: null,
    }),
    computed: {
      canSubmit() {
        if (!!this.emailError) return false;
        return (!!this.email & !this.loading);
      },
      emailError() {
        if (!/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(this.email))
          return "Formato non corretto";
      },
    },
    methods: {
      askReset() {
        this.loading = true;
        axios.post('/api/user/reset', {
          email: this.email
        })
          .then(() => {
            this.loading = false;
            this.sent = true;
          })
          .catch(() => {
            this.error = 'unknown';
            this.loading = false;
          });
      },

    }
  }
</script>
