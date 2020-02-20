<template>
  <div class="container  pt-5 pb-4">
    <h2 class="margin-title">{{$t('user.edit_data')}}</h2>
    <div v-if="bkUser && user">
      <form @submit.prevent="saveData" class="padding-md">
        <div class="row ">
          <div class="col-12 col-sm-10 col-md-8">
            <IFTAInput v-model="bkUser.name" id="name" type="text" :label="$t('register.name')" :required="true"
                       :error="nameError"/>
          </div>
          <div class="col-12 col-sm-10 col-md-8">
            <IFTAInput v-model="bkUser.registration_number" id="matricola" type="text"
                       :label="$t('register.matricola')" :required="true" :error="matricolaError"/>
          </div>
          <div class="col-12 col-sm-10 col-md-8">
            <IFTAInput v-model="bkUser.email" id="email" type="email" :label="$t('register.email')"
                       :required="true" :error="emailError"/>
          </div>
        </div>
        <div class="row" style="margin-top: 30px">
          <div class="col-6"></div>
          <div class="col-6 col-sm-4 col-md-3" style="float: right">
            <button type="submit" class="btn btn-mugugno-primary" style="width: 100%" :disabled="loading">
              <p class="button-text" v-if="!loading">{{$t('save')}}
                <font-awesome-icon :icon="!editEnabled?'pen':'save'"/>
              </p>
              <spinner v-else/>
            </button>
          </div>
        </div>
      </form>

      <form @submit.prevent="changePw">
        <h2>{{$t('user.edit_password')}}</h2>
        <div class="col-12 col-sm-10 col-md-8">
          <IFTAInput v-model="bkUser.oldPassword" id="password" type="password" :label="$t('user.old_password')"
                     :required="true" :error="oldPasswordError"/>
        </div>
        <div class="col-12 col-sm-10 col-md-8">
          <IFTAInput v-model="bkUser.password" id="password" type="password" :label="$t('login.password')"
                     :required="true"/>
        </div>
        <div class="col-12 col-sm-10 col-md-8">
          <IFTAInput v-model="bkUser.rePassword" id="repassword" type="password" :label="$t('register.repw')"
                     :required="true" :error="reError"/>
        </div>
        <div class="row" style="margin-top: 30px">
          <div class="col-6"></div>
          <div class="col-6 col-sm-4 col-md-3" style="float: right">
            <button type="submit" class="btn btn-mugugno-primary" style="width: 100%" :disabled="loadingChangePw">
              <p class="button-text" v-if="!loadingChangePw">{{$t('save')}}
                <font-awesome-icon  :icon="!editEnabled?'pen':'save'"/>
              </p>
              <spinner v-else/>
            </button>
          </div>
        </div>
      </form>
    </div>
    <spinner v-else class="large-spinner"/>
  </div>
</template>

<script>
  import Spinner from "../components/General/Spinner";
  import {mapGetters, mapActions} from "vuex";
  import axios from "../axios";
  import IFTAInput from "../components/IFTAInput";

  export default {
    name: "UserEdit",
    components: {IFTAInput, Spinner},
    data: () => ({
      loading: false,
      loadingChangePw: false,
      editEnabled: false,
      bkUser: null,
      changePwError: "",
    }),
    created(){
      this.bkUser = {...this.user};
    },
    methods: {
      ...mapActions(['init']),
      changePw() {
        if(this.bkUser.password !== this.bkUser.rePassword) return
        this.loadingChangePw = true;
        axios.put(`/api/user/change-password`, {
          oldPassword: this.bkUser.oldPassword,
          password: this.bkUser.password,
        }).then(response => {
          this.loadingChangePw = false;
          this.init();
        }).catch(response => {
          this.loadingChangePw = false;
          this.changePwError = true
        });
      },
      saveData() {
        this.loading = true;
        axios.put(`/api/user/update`, this.bkUser).then(response => {
          this.init();
          this.loading = false;
        });
      },
      cancelEdit: function () {
        this.bkUser = {...this.user};
      },
    },
    computed: {
      ...mapGetters(["user"]),

      nameError() {
        if (!(/^[a-zA-Z'-\s]+$/i).test(this.bkUser.name))
          return "Formato nome non corretto";
      },
      reError() {
        if (this.bkUser.password !== this.bkUser.rePassword)
          return "Le password non coincidono";
      },
      emailError() {
        if (/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/.test(this.bkUser.email))
          return "Formato non corretto";
      },
      matricolaError(string) {
        if (!(/[sS][0-9]{7}$/i).test(this.bkUser.registration_number))
          return "Formato matricola non corretto";
      },
      oldPasswordError() {
        if (this.changePwError)
          return "Password vecchia errata";
      },
    },
    watch: {
      user() {
        this.bkUser = {...this.user};
      }
    }
  }
</script>

<style scoped lang="scss">

  @import "../../sass/variables";

  .large-spinner {
    color: $primary-blu !important;
    font-size: 5rem;
  }

  p {
    font-size: 1.25rem;
  }

  .margin-title {
    margin-bottom: 1.5rem;
  }

  .margin-center {
    margin-bottom: auto;
    margin-top: auto;
  }

  .gravatar {
    margin-bottom: 20px;
    border-radius: 50%
  }

  .button-text {
    margin-bottom: 0;
  }
</style>
