<template>
  <div class="row">
    <div class="col-md-8">
      <h3>{{name}}</h3>
    </div>
    <div class="col-md-3" v-on:click="clicked()">
      <rating-star :rating="rating"/>
    </div>
    <div class="col-md-1">
<!--     <redirect-button :redirect_link="{-->
<!--       name:'course',-->
<!--       params: {-->
<!--         areas_id: this.$route.params.areas_id,-->
<!--         courses_id: course_id-->
<!--       }-->
<!--     }"/>-->
      <router-link :to="{name : 'course', params: { areas_id: this.$route.params.areas_id, course_id: course_id}}">
        <font-awesome-icon icon="arrow-circle-right"/>
      </router-link>
    </div>
  </div>
</template>

<script>
  import RatingStar from "./../General/RatingStar";
  import RedirectButton from "../General/RedirectButton";

  export default {
    name: "Course",
    components: {RedirectButton, RatingStar},
    props: {
      name: {
        type: String
      },
      rating: {
        type: Number,
        default: 0
      },
      course_id: {
        type: Number,
      }
    },
    methods: {
      clicked: function () {
        console.log("TEST ROUTER")
        console.log(this.$route.params)
        console.log(this.$route.params.areas_id)
      }
    }
  }
</script>

<style scoped lang="scss">

  @import "../../../sass/_variables.scss";


</style>
