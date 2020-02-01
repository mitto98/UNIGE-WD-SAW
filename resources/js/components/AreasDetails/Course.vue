<template>
  <div class="row">
    <div class="col-md-8">
      <h3>{{name}}</h3>
    </div>
    <div class="col-md-4">
      <font-awesome-icon v-for="i in rating" :key="i" icon="star" class="star-yellow star-size-md"/>
    </div>
  </div>
</template>

<script>
  export default {
    name: "Course",
    props: {
      name: {
        type: String
      },
      rating: {
        type: Number,
        default: 0
      }
    }
  }
</script>

<style scoped>

  @import "../../../sass/_variables.scss";

</style>
