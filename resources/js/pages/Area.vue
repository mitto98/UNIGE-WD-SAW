<template>
  <div class="container body-page">
    <div  v-for="department in area.departments"  :key="department.code">
      <h5><b>{{department.code}}</b></h5>
      <p style="font-size: 13px">{{department.name}}</p>

      <div class="courses">
        <course-card v-for="course in courses" :key="course.id" :course="course"/>
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
      area: [],
      courses: [
        {
          id: 111,
          name: "Informatica",
          rating: 5
        },
        {
          id: 222,
          name: "Bioingegneria",
          rating: 3.3
        },
        {
          id: 333,
          name: "Digital Humanities",
          rating: 2.5
        },
        {
          id: 444,
          name: "Ingegneria Biomeotica",
          rating: 4.6
        },
      ]
    }),
    created() {
      axios.get("/area/2").then(response => {
        this.area = response.data;
      })
    }
  }
</script>

<style scoped>
</style>
