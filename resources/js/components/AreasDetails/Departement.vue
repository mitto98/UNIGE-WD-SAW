<template>
  <div class="distance">
    <h2><b>{{code}}</b></h2>
    <p style="font-size: 13px">{{name}}</p>

    <div class="container">
      <course v-for="course in courses" :key="course.id" :name="course.name" :rating="course.rating"/>
    </div>
  </div>
</template>

<script>
  import Course from "./Course";

  export default {
    name: "Departements",
    components: {Course},
    props: {
      name: {
        type: String
      },
      code: {
        type: String
      }

    },
    data: () => ({
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

  @import "../../../sass/_variables.scss";

  .distance {
    margin: 10px 0 20px 0;
  }

</style>
