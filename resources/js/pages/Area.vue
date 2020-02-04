<template>
  <div class="container body-page">
    <div  v-for="departement in departements"  :key="departement.code" class="distance">
      <h2><b>{{departement.code}}</b></h2>
      <p style="font-size: 13px">{{departement.name}}</p>

      <div class="container">
        <course v-for="course in courses" :key="course.id"
                :name="course.name" :rating="course.rating" :course_id="course.id"/>
      </div>
    </div>
  </div>
</template>

<script>
  import Course from "../components/AreasDetails/Course";

  export default {
    name: "AreaDe",
    components: {Course},
    data: () => ({
      departements: [
        {
          name: "Dipartimento di stern",
          code: "DIBRIS",
        },
        {
          name: "Dipartimento di padre nostro",
          code: "DAD",
        },
        {
          name: "Dipartimento di daje roma ao",
          code: "DAJE",
        },
      ],
      courses: [
        {
          id: 111,
          name: "Informatica",
          rating: 5
        },
        {
          id: 222,
          name: "Bioingegneria",
          rating: 3
        },
        {
          id: 333,
          name: "Digital Humanities",
          rating: 2
        },
        {
          id: 444,
          name: "Ingegneria Biomeotica",
          rating: 4
        },
      ]
    })
  }
</script>

<style scoped>

</style>
