<template>
  <div class="course-card">
    <div>
      <router-link :to="{name : 'course',
      params: { areas_id: this.$route.params.areas_id, course_id: course.course_id}}">
        <h5>{{course.name}}</h5>
        <rating-star :rating="course.rating" :large="false"/>
      </router-link>
    </div>
  </div>
</template>

<script>
  import RatingStar from "./../General/RatingStar";

  export default {
    name: "CourseCard",
    components: {RatingStar},
    props: ['course']
  }
</script>

<style scoped lang="scss">
  @import "../../../sass/_variables.scss";

  .course-card {
    display: inline-block;
    width: 276px;
    padding: 6px;
    list-style: none;

    div {
      height: 135px;
      padding: 4px;
      background-color: $primary-blu;
      text-align: center;

      display: flex;
      flex-direction: column;
      justify-content: center;
      align-content: center;
      a {
        color: white !important;
      }
    }
  }
</style>
