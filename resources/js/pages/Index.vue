<template>
  <div>
    <div class="landscape mb-4"/>
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="area-container">
            <area-box v-for="area in areas" :key="area.id" :area="area"/>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  import AreaBox from "../components/Home/AreaBox";

  export default {
    components: {AreaBox},
    data: () => ({
      areas: [
        {
          id: 1,
          'background_color': 'yellow',
          acronym: "Farmacia",
        },
        {
          id: 2,
          'background_color': 'orange',
          acronym: "Farmafbi",
          text_color: "#fff",
        },
        {
          id: 3,
          'background_color': 'blue',
          acronym: "Scienze MFN",
          text_color: "#fff",
        },
      ]
    })
  }
</script>

<style lang="scss">
  @import "../../sass/_variables.scss";

  .landscape {
    height: 256px;
    background-image: url("/img/home_poster.jpg");
    background-position: center;
    background-repeat: no-repeat;
  }

  .area-container {
    width: 100%;
    text-align: center;
  }
</style>
