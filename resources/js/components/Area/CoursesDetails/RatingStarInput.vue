<template>
  <p class="star" :class="{large: large}">
    <font-awesome-icon v-for="i in 5" @mouseover="realRating = i" @click="emitEvent"
                       :key="i" :icon="(realRating < i ) ?farStar:faStar"/>
  </p>
</template>

<script>
  import {faStar, faStarHalfAlt} from "@fortawesome/free-solid-svg-icons";
  import {faStar as farStar} from "@fortawesome/free-regular-svg-icons"

  export default {
    name: "RatingStarInput",
    props: {
      rating: {
        type: Number,
        default: 0,
      },
      large: {
        type: Boolean,
        default: true
      },
    },
    data: () => ({
      realRating: null
    }),
    methods:{
      emitEvent : function () {
        this.$emit('updateRatingStar', this.realRating)
      }
    },
    computed: {
      faStarHalfAlt: () => faStarHalfAlt,
      faStar: () => faStar,
      farStar: () => farStar,

      getRatingFull() {
        return this.rating
      },

      noFullStar() {
        return Math.trunc(this.rating + .49);
      },
      haveHalfStar() {
        const decimal = Number(this.rating % 1).toFixed(2);
        return (decimal > 0) && (decimal <= .5);
      },
      noEmptyStar() {
        return 5 - (this.noFullStar + (this.haveHalfStar ? 1 : 0));
      }
    }
  }
</script>

<style scoped lang="scss">
  p.star {
    font-size: 0;
    color: #ffc107;

    &.large {
      svg {
        font-size: 25px;
        margin-left: 5px;
        margin-right: 5px;
      }
    }

    svg {
      font-size: 20px;
      margin-left: 2px;
      margin-right: 2px;
    }
  }

  .star-gray {
    color: gray !important;;
  }

</style>
