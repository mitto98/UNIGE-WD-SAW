<template>
  <div class="area-container">
    <area-box v-for="area in areas" :key="area.id" :area="area"/>
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

  .area-container {
    width: 100vw;
    text-align: center;


  }
</style>
