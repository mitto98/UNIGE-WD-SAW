<template>
  <div>
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-8">
          <img src="/img/home.svg" width="100%" alt="home image">
        </div>
        <div class="col-md-4 pt-md-5" style=" margin-top: auto; margin-bottom: auto;">
          <h1>{{$t('home.opinions')}}</h1>
          <p>{{$t('home.what_is')}}</p>
        </div>
        <search v-model="searchText" :placeholder="$t('home.search')" class="col-md-6  my-5"/>
        <div v-if="!searchText" class="col-12 area-container">
          <area-box v-for="area in areas" :key="area.id" :area="area"/>
        </div>
        <div v-else class="row area-container">
            <course-card v-for="course in filteredCourses" :key="course.id" :course="course"
                         class="col-12 col-sm-6 col-md-4 col-lg-3"/>
          <div v-if="!filteredCourses.length" style="text-align: center; width: 100%;">
            <p class="no-result-style"><i>{{$t('no_result')}}</i></p>
          </div>
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

  .no-result-style {
    margin-left: auto;
    margin-right: auto;
    font-size: 1.5rem
  }
</style>
