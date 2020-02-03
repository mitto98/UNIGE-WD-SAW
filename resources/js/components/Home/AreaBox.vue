<template>
  <div class="area-box">
    <router-link :to="{name : 'area', params: { areas_id: area.id }} "
                 class="rounded text-center"
                 :style="{backgroundColor: area.background_color, color: area.text_color || '#000'}">
      {{area.acronym}}
    </router-link>
  </div>
</template>

<script>
  export default {
    props: ['area'],
    name: "AreaBox"
  }
</script>

<style lang="scss">
  @keyframes shift-in {
    0% {
      padding: 8px;
    }
    100% {
      padding: 16px;
    }
  }

  @media (max-width: 410px) {
    .area-box {
      width: 40vw !important;
      height: 40vw !important;
    }
  }

  .area-box {
    display: inline-block;
    width: 180px;
    height: 180px;
    padding: 8px;
    cursor: pointer;
    user-select: none;

    &:hover {
      padding: 16px;
      animation: shift-in .3s;
    }

    a {
      width: 100%;
      height: 100%;

      display: flex;
      flex-direction: column;

      justify-content: center;
      align-content: center;

      font-weight: bold;

      &:hover {
        text-decoration: none;
      }
    }
  }
</style>
