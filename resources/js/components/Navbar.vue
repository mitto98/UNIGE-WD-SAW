<template>
  <nav class="navbar navbar-expand-sm navbar-dark py-4">
    <router-link class="navbar-brand " :to="{name: 'index'}" style="display: flex!important;">
      <img src="/img/loghi/logo_UniGe.svg" class="edit-size" alt="UniGe">
      <p style="margin-left: 5px; font-size: 1.75rem">Opinioni</p>
    </router-link>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <font-awesome-icon style="color: white" icon="bars"/>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item">
          <p class="nav-link">
            <span class="lang-select" @click="() => {$i18n.locale = 'it'}">IT</span>/<span class="lang-select"
                                                                                           @click="() => {$i18n.locale = 'en'}">EN</span>
          </p>
        </li>
        <li class="nav-item" v-if="getUserName === ''">
          <router-link :to="{name: 'login'}" class="nav-link">
            <font-awesome-icon icon="user"/>
            Login
          </router-link>
        </li>
        <li class="nav-item dropdown" v-if="getUserName !== ''">
          <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown"
             aria-haspopup="true" aria-expanded="false">
            <font-awesome-icon icon="user"/>
            {{getUserName}}
          </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" @click="logut">Logout</a>
          </div>
        </li>
      </ul>
    </div>
  </nav>
</template>

<script>
  import {mapActions, mapGetters} from "vuex";

  export default {
    name: "Navbar",
    data: () => ({}),
    computed: {
      ...mapGetters('user', ["getUserData"]),
      getUserName : function () {
        console.log("dadsadsada")
        console.log(this.getUserData)
        var a = this.getUserData
        console.log(a)
        return a?.name
      }
    },
    methods: {
      ...mapActions("user", ["doLogout"]),
      logut({}) {
        this.doLogout().then(() => {
        }).catch(error => {
          if (error.response.data.error === "invalid_grant") {
            this.error = this.$t("logout.invalid")
          }
        });
      },
    }
  }
</script>

<style scoped lang="scss">
  @import "../../sass/_variables.scss";

  .navbar {
    background-color: $primary-blu;
    display: flex;
    padding: 8px;

    .navbar-brand {
      display: inline-block;

      padding-left: 8px;
      margin-bottom: 0;

      color: #1899FA !important;
      font-weight: bolder;

      img {
        width: 174px;
        height: 40px;

        border-right: 1px solid #fff;
        margin-right: 4px;
      }
    }
  }

  .lang-select {
    cursor: pointer;

    &:hover {
      text-decoration: underline;
    }
  }

  .nav-link {
    color: #fff !important;
  }

  .button {
    border-color: $primary-blu;
  }

  .align-bottom-right {
    margin-left: auto;
  }

  .style-logo {
    display: flex;
  }

  .name-style {
    color: white;
    font-size: 1rem;
  }

  .dropdown-menu {
    top: auto;
    min-width: 9rem
  }

  @media screen and (max-width: 576px){
    .edit-size{
      width: 100px !important;
      padding-right: 10px;
    }
  }
</style>
