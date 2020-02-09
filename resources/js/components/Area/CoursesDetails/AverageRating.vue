<template>
  <div class="row" style="margin-top: 20px">
    <div class="col-md-5 ">
      <p class="average-rating">4</p>
      <rating-star :rating="4" style="text-align:center"/>
    </div>
    <div class="col-md-7">
      <rating-bar v-for="i in 5 " :key="i" :rating_number="i" :percentage_number="i*15"/>
    </div>
  </div>
</template>

<script>
  import RatingStar from "../../General/RatingStar";
  import RatingBar from "../../General/RatingBar";

  export default {
    name: "AverageRating",
    components: {RatingBar, RatingStar}

  }
</script>

<style scoped lang="scss">

  .average-rating {
    margin-bottom: 0px;
    text-align: center;
    font-size: 100px
  }


</style>
