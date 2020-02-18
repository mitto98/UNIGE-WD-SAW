<template>
  <div class="container pt-5 pb-4">
    <div v-if="area || !loading">
        <h2 class="font-weight-bold">{{area.name}}</h2>
<!--        <p style="font-size: 13px">{{department.name}}</p>-->
        <div class="row">
            <course-card v-for="course in area.courses" :key="course.id" :course="course" class="col-12 col-sm-6 col-md-4 col-lg-3"/>
        </div>
    </div>
    <spinner v-if="loading" class="large-spinner"/>
  </div>
</template>

<script>
  import axios from "../axios";
  import CourseCard from "../components/Area/CourseCard";
  import Spinner from "../components/General/Spinner";

  export default {
    name: "Area",
    components: {Spinner, CourseCard},
    data: () => ({
      area: null,
      loading:false
    }),
    created() {
      this.loading = true;
      axios.get(`/api/area/${this.$route.params.area}`).then(response => {
        this.loading = false;
        this.area = response.data;
      })
    }
  }
</script>

<style scoped lang="scss">

  @import "../../sass/variables";

  .large-spinner{
    color: $primary-blu !important;
    font-size: 5rem;
  }

</style>
