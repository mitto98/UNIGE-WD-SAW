<template>
  <div>
    <div class="landscape mb-4"/>
    <div class="container">
      <div class="row">
        <div class="col-12 area-container">
            <area-box v-for="area in areas" :key="area.id" :area="area"/>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  import AreaBox from "../components/Home/AreaBox";
  import axios from "../axios";

  export default {
    components: {AreaBox},
    data: () => ({
      areas: []
    }),
    created() {
      axios.get('/api/area').then(response => {
        this.areas = response.data;
      });


      axios.get('/api/user')
        .then(response => {
          console.log("USER RESPONSE", response.data);
        });
    }
  }
</script>

<style lang="scss">
  @import "../../sass/_variables.scss";

  .landscape {
    height: 256px;
    background-image: url("/img/home_poster.jpg");
    background-size: cover;
    background-position: center center;
    background-repeat: no-repeat;
  }

  .area-container {
    width: 100%;
    text-align: center;
  }
</style>
