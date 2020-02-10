<template>
  <div class="container pt-5">
    <div v-if="area">
      <div v-if="area" v-for="department in area.departments" :key="department.code" class="mb-4">
        <h5 class="font-weight-bold">{{department.code}}</h5>
        <p style="font-size: 13px">{{department.name}}</p>
        <div class="courses">
          <course-card v-for="course in department.courses" :key="course.id" :course="course"/>
        </div>
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
      axios.get(`/area/${this.$route.params.area}`).then(response => {
        this.area = response.data;
      })
    }
  }
</script>

<style scoped>
</style>
