<template>
  <div>
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-8">
          <img src="/img/home.svg" width="100%" alt="home image">
        </div>
        <div class="col-md-4 pt-md-5">
          <h1>{{$t('home.opinions')}}</h1>
          <p>{{$t('home.what_is')}}</p>
        </div>
        <search v-model="searchText" class="col-md-6  my-5"/>
        <div v-if="!searchText" class="col-12 area-container">
          <area-box v-for="area in areas" :key="area.id" :area="area"/>
        </div>
        <div v-else  class="col-12 area-container">
          <course-card v-for="course in filteredCourses" :key="course.id" :course="course"/>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  import AreaBox from "../components/Home/AreaBox";
  import Search from "../components/Home/Search";
  import CourseCard from "../components/Area/CourseCard";
  import axios from "../axios";

  export default {
    components: {AreaBox, Search, CourseCard},
    data: () => ({
      areas: [],
      searchText: null
    }),
    created() {
      axios.get('/api/area').then(response => {
        this.areas = response.data;
      });
    },
    computed: {
      filteredCourses() {
        const result = [];
        this.areas.forEach(area => {
          result.push(...area.courses.filter(course =>
            course.name.toLowerCase().includes(this.searchText.toLowerCase())));
        });
        return result;
      }
    }
  }
</script>

<style lang="scss">
  @import "../../sass/_variables.scss";

  .area-container {
    width: 100%;
    text-align: center;
  }
</style>
