<template>
  <div class="container pt-5 pb-4">
    <div v-if="area">
        <h5 class="font-weight-bold">{{area.name}}</h5>
<!--        <p style="font-size: 13px">{{department.name}}</p>-->
        <div class="row">
            <course-card v-for="course in area.courses" :key="course.id" :course="course" class="col-6 col-sm-6 col-md-4 col-lg-3"/>
        </div>
    </div>
  </div>
</template>

<script>
  import axios from "../axios";
  import CourseCard from "../components/Area/CourseCard";

  export default {
    name: "Area",
    components: {CourseCard},
    data: () => ({
      area: null,
    }),
    created() {
      axios.get(`/api/area/${this.$route.params.area}`).then(response => {
        this.area = response.data;
      })
    }
  }
</script>

<style scoped>
</style>
