<template>
  <div>
    <div class="row" v-for="rating in ratings" :key="rating.rating">
      <div class="col-">
        <p class="number-size">{{rating.rating}} - {{rating.count}}</p>
      </div>
      <div class="col-10">
        <div class="progress mt-2">
          <div class="progress-bar radius" role="progressbar"
               :style="{width: rating.percentage+'%'}"
               :aria-valuenow="rating.percentage"
               aria-valuemin="0"
               aria-valuemax="100"></div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  export default {
    name: "RatingBar",
    props: ['ratings']
  }
</script>

<style scoped lang="scss">

  @import "../../../sass/variables";

  .progress-bar {
    background-color: $primary-blu;
    &:hover {
      transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
      background-color: $primary-cyan;
      cursor: pointer;
    }
  }

  .number-size {
    font-size: 20px;
  }

  .radius {
    border-top-right-radius: 0.25rem;
    border-bottom-right-radius: 0.25rem;
    border-bottom-left-radius: 0.25rem;
    border-top-left-radius: 0.25rem;
  }
</style>
