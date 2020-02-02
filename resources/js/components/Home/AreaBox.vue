<template>
  <div class="area-box">
    <router-link :to="{name : 'area', params: { areas_id: area.id }} ">
      <div class="rounded" :style="{backgroundColor: area.background_color}">
        <p class="text-center" :style="{color: area.text_color || '#000'}">{{area.acronym}}</p>
      </div>
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
    0%   {padding: 8px;}
    100% {padding: 16px;}
  }

  .area-box {
    width: 180px;
    height: 180px;
    padding: 8px;
    display: inline-block;
    cursor: pointer;
    user-select: none;
    &:hover {
      padding: 16px;
      animation: shift-in .3s;
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
