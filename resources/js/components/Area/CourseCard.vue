<template>
  <div class="course-card">
    <router-link :to="{name : 'course', params: { area: this.$route.params.area, course: course.id}}">
      <div>
        <h5>{{course.name}}</h5>
        <rating-star :rating="course.rating" :large="false"/>
      </div>
    </router-link>

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

  @keyframes shift-in {
    0% {
      padding-left: 6px;
      padding-right: 6px;
    }
    100% {
      padding-left: 18px;
      padding-right: 18px;
    }
  }

  .course-card {
    display: inline-block;
    width: 276px;
    padding: 6px;
    list-style: none;
    vertical-align: top;

    cursor: pointer;
    text-decoration: none !important;
    div {
      height: 135px;
      padding: 4px;
      background-color: $primary-blu;
      color: white;
      text-align: center;
      &:hover{
        animation :change-color-blue .3s;
        background-color: $primary-cyan;
      }
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-content: center;
      a {
        color: white !important;
      }
    }
    &:hover {
      padding-left: 18px;
      padding-right: 18px;
      animation: shift-in   .3s;
    }
  }
</style>
