<template>
  <p class="star" :class="{large: large}" @mouseleave="hoverRating = 0">
    <font-awesome-icon v-for="i in 5" @mouseover="hoverRating = i" @click="emitEvent"
                       :key="i" :icon="shouldBeFull(i) ? farStar : faStar"/>
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
      value: {
        type: Number,
        default: 0,
      }
    },
    data: () => ({
      hoverRating: 0
    }),
    methods:{
      emitEvent() {
        this.$emit('input', this.hoverRating)
      },
      shouldBeFull(i) {
        if (this.hoverRating !== 0) {
          return this.hoverRating < i;
        } else {
          return this.value < i;
        }
      }
    },
    computed: {
      faStarHalfAlt: () => faStarHalfAlt,
      faStar: () => faStar,
      farStar: () => farStar,
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
      cursor: pointer;
    }
  }

  .star-gray {
    color: gray !important;;
  }

</style>
