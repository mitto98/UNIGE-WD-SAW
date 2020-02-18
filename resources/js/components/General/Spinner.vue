<template>
  <p class="text-center text-white mt-4 small">
    <font-awesome-icon :icon="faSpinner"  lg spin/>
  </p>
</template>

<script>
  import {faCircleNotch} from "@fortawesome/free-solid-svg-icons";

  export default {
    name: "Spinner",
    computed: {
      faSpinner: () => faCircleNotch,
    }
  }
</script>

<style scoped>

  .small{
    font-size: 1.20rem;
  }
  p{
    margin-top: 0px !important;
    margin-bottom: 0px !important;
  }
</style>
