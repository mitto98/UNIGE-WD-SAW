<template>
  <div class="area-box">
    <div :style="{backgroundColor: area.background_color}">
      <p class="text-center" :style="{color: area.text_color || '#000'}">{{area.acronym}}</p>
    </div>
  </div>
</template>

<script>
  export default {
    props: ['area'],
    name: "AreaBox"
  }
</script>

<style lang="scss">
  .area-box {
    width: 180px;
    height: 180px;
    padding: 8px;
    display: inline-block;
    cursor: pointer;
    user-select: none;
    &:hover {
      padding: 16px;
      /*animation-name: hovering;*/
      /*animation-duration: 4s;*/
    }
    div {
      width: 100%;
      height: 100%;

      display: flex;

      justify-content: center;
      align-content: center;

      flex-direction: column;
    }
  }
</style>
