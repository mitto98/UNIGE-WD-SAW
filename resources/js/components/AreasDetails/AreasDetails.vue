<template>
  <div class="container body-page">
    <departement v-for="departement in departements" :key="departement.code" :name="departement.name"
                  :code="departement.code"/>
  </div>
</template>

<script>
  import Departement from "./Departement";

  export default {
    name: "AreaDe",
    components: {Departement},
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
      ]
    })
  }
</script>

<style scoped>

</style>
