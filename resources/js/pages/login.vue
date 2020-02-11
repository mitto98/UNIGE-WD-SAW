<template>
  <div class="im-blue-da-ba-dee">
    <div class="container">
      <div class="row justify-content-center">
        <form class="col-sm-12 col-md-6 col-lg-4">
          <h1 class=" font-weight-bold text-center text-white">Mugugno</h1>
          <img src="/img/estudiantes.png" alt="login image" class="mb-2" width="100%">
          <div class="form-group">
            <input type="text" class="form-control" :placeholder="$t('login.username')">
          </div>
          <div class="form-group">
            <input type="text" class="form-control" :placeholder="$t('login.password')">
          </div>
          <button type="button" class="btn btn-primary btn-block">{{$t('login.login')}}</button>
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
  export default {
    name: "login"
  }
</script>
