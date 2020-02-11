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
          <button type="button" class="btn btn-primary btn-block">{{$t('login.reset')}}</button>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
  export default {
    name: "reset"
  }
</script>
