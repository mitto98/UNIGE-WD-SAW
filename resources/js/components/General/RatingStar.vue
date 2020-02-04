<template>
  <div>
    <font-awesome-icon v-for="i in Math.trunc(rating)" :key="i" icon="star" :class="large?'star-yellow star-size-lg':'star-yellow star-size-sm'"/>
    <font-awesome-icon v-if="rating%1 >= 0.75" icon="star" :class="large?'star-yellow star-size-lg':'star-yellow star-size-sm'"/>
    <font-awesome-icon v-if="rating%1 >= 0.2 && rating%1 < 0.75" icon="star-half" :class="large?'star-yellow star-size-lg':'star-yellow star-size-sm'"/>
  </div>
</template>

<script>
  export default {
    name: "RatingStar",
    props: {
      rating: {
        type: Number,
        default: 0,
      },
      large:{
        type:Boolean,
        default: true
      }
    }
  }
</script>

<style scoped>

  .star-size-lg {
     font-size: 20px;
     margin-left: 5px;
     margin-right: 5px;
   }

  .star-size-sm {
    font-size: 17px;
    margin-left: 2px;
    margin-right: 2px;
  }

  .star-yellow {
    color: #ffc107 !important;;
  }

</style>
