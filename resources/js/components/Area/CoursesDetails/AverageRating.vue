<template>
  <div class="row">
    <div class="col-md-5 text-center">
      <p class="average-rating m-0">{{average_rating.toFixed(1)}}</p>
      <rating-star :rating="average_rating"/>
      <p>{{total}} {{ $t('course.ratings') }}</p>
    </div>
    <div class="col-md-7 py-4">
      <div class="row rating-row">
        <div v-for="rating in ratings">
          <div class="side" :style="{
            fontWeight: rating.rating === value ? 'bold' : 'normal',
            textDecoration: rating.rating === value ? 'underline' : 'none',
               }">
            {{rating.rating}}
          </div>
          <div class="middle">
            <div class="bar-container" @click="() => handleRatingSelection(rating.rating)">
              <div :style="{
                backgroundColor: colors[rating.rating-1],
                width: `${rating.percentage}%`,
              }"/>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  import RatingStar from '../../General/RatingStar';

  export default {
    name: 'AverageRating',
    components: {RatingStar},
    props: ['average_rating', 'total', 'ratings', 'value'],
    data: () => ({
      colors: ['#f44336', '#ff9800', '#00bcd4', '#2196F3', '#4CAF50'],
    }),
    methods: {
      handleRatingSelection(rating) {
        this.$emit('input', rating===this.value ? 0 : rating);
      },
    },
  };
</script>

<style scoped lang="scss">

  .average-rating {
    font-size: 4em;
  }

  .rating-row {
    &:after {
      content: "";
      display: table;
      clear: both;
    }

    div {
      width: 100%;

      .side {
        float: left;
        width: 15%;
        text-align: center;
      }

      .middle {
        float: left;
        width: 85%;

        .bar-container {
          width: 100%;
          background-color: #f1f1f1;
          text-align: center;
          color: white;
          margin-top: 3px;
          cursor: pointer;

          &:hover {
            div {
              filter: brightness(1.2);
            }
          }

          div {
            height: 18px;
          }
        }
      }
    }
  }

  @media (max-width: 400px) {
    .side, .middle {
      width: 100%;
    }
  }
</style>
