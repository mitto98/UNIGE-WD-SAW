<template>
  <div class="row min-height">
    <div class="col-md-1">
      <font-awesome-icon icon="user" class="icon-size"/>
    </div>
    <div class="col-md-6">
      <rating-star :rating="rating" :large="false"/>
      <p>{{text}}</p>
    </div>
  </div>
</template>

<script>
  import RatingStar from "../../General/RatingStar";

  export default {
    name: "Comments",
    components: {RatingStar},
    props: {
      text: {
        type: String
      },
      rating: {
        type: Number
      }
    }
  }
</script>

<style scoped lang="scss">

  .min-height {
    min-height: 140px;
    max-height: 140px;
  }

  .icon-size {
    font-size: 50px;
  }

</style>
