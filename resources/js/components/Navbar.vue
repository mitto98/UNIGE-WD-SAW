<template>
  <nav class="navbar navbar-expand navbar-dark py-4">
    <a class="navbar-brand" href="/">
      <img src="/img/loghi/logo_UniGe.svg" alt="UniGe"> Mugugno
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"/>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ml-auto">
        <!--
        <li class="nav-item">
          <p class="nav-link" href="#"><span class="lang-select">ITA</span>/<span class="lang-select">EN</span></p>
        </li>
        -->
        <li class="nav-item">
          <router-link :to="{name: 'login'}" class="nav-link">
            <font-awesome-icon icon="user"/>
          </router-link>
        </li>
      </ul>
    </div>
  </nav>
</template>

<script>
  export default {
    name: "Navbar",
    methods: {
      showMenuModal: function (event) {
        console.log(event)
      }
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

</style>
