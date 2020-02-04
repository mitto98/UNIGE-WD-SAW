<template>
  <div class="row">
    <div class="col-md-2">
      <p class="number-size">{{rating_number}}</p>
    </div>
    <div class="col-md-10">
      <div class="progress">
        <div class="progress-bar radius" role="progressbar" :style="barSize" :aria-valuenow="percentage_number"
             aria-valuemin="0"
             aria-valuemax="100"></div>
      </div>
    </div>
  </div>
</template>

<script>
  export default {
    name: "RatingBar",
    props: {
      rating_number: {
        type: Number,
        default: 0
      },
      percentage_number: {
        type: Number,
        default: 0
      }
    },
    computed: {
      barSize() {
        return {
          "width": this.percentage_number + "%"
        };
      }
    }
  }
</script>

<style scoped lang="scss">

  @import "../../../sass/variables";

  .progress-bar {
    background-color: $primary-blu;
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
