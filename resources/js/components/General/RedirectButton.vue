<template>
<!--  <router-link :to="redirect_link">-->
  <router-link :to="{name : 'course', params: { areas_id: 3, course_id: 1}}">
      <font-awesome-icon icon="arrow-circle-right"/>
  </router-link>
</template>

<script>
  export default {
    name: "RedirectButton",
    props: ["redirect_link"]

  }
</script>

<style lang="scss" scoped>
  @import "../../../sass/variables";

  .btn-unige-primary {
    color: $primary-blu
  }

  .btn-unige-md {
    font-size: 30px;
  }

</style>
