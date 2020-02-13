<template>
  <div class="row" style="margin-top: 20px">
    <div class="col-md-5 ">
      <p class="average-rating">4</p>
      <rating-star :rating="4" style="text-align:center"/>
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
    data: () => ({
      ratings: [
        {
          rating: 5,
          rating_percentage: 52,
        },
        {
          rating: 4,
          rating_percentage: 22,
        },
        {
          rating: 3,
          rating_percentage: 8,
        },
        {
          rating: 2,
          rating_percentage: 13,
        },
        {
          rating: 1,
          rating_percentage: 5,
        },
      ]
    }),

  }
</script>

<style scoped lang="scss">

  .average-rating {
    margin-bottom: 0px;
    text-align: center;
    font-size: 100px
  }


</style>
