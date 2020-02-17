<template>
  <div class="row" style="margin-top: 20px">
    <div class="col-md-5 ">
      <p class="average-rating">{{average_rating.toFixed(2)}}</p>
      <rating-star :rating="average_rating" style="text-align: center"/>
    </div>
    <div class="col-md-7">
      <rating-bar :ratings="ratings"/>
    </div>
  </div>
</template>

<script>
  import RatingStar from "../../General/RatingStar";
  import RatingBar from "../../General/RatingBar";

  export default {
    name: "AverageRating",
    components: {RatingBar, RatingStar},
    props:["average_rating","ratings"],
  }
</script>

<style scoped lang="scss">

  .average-rating {
    margin-bottom: 0px;
    text-align: center;
    font-size: 100px
  }


</style>
