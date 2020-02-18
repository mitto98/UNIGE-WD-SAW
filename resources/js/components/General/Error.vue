<template>
  <div v-if="error" class="alert alert-danger alert-dismissible fade show" role="alert">
    {{error === 'unknown' ? $t('unknown_error') : error}}
<!--    <button type="button" class="close" @click="error = null">-->
<!--      <span aria-hidden="true">&times;</span>-->
<!--    </button>-->
  </div>
</template>

<script>
  export default {
    name: "Error",
    props: ['error']
  }
</script>

<style scoped>

</style>
