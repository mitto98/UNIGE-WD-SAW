<template>
  <div>
    <div class="row min-height padding-md">
      <div class="col-12 col-md-12 spacing">
        <div class="align-in-row">
          <font-awesome-icon icon="user" class="icon-size"/>
          <p class="title-style">{{comment.name}}</p>
        </div>
      </div>
      <div class="col-12 col-md-12">
        <div class="align-in-row">
          <rating-star :rating="comment.rating" :large="false"/>
          <p class="title-style"><b>{{comment.title}}</b></p>
        </div>
      </div>
      <div class="col-12 col-md-6">
        <p class="text-style">{{comment.text}}</p>
      </div>
    </div>
    <hr/>
  </div>
</template>

<script>
  import RatingStar from "../../General/RatingStar";

  export default {
    name: "Comments",
    components: {RatingStar},
    props: ["comment"]
  }
</script>

<style scoped lang="scss">

  .min-height {
    min-height: 140px;
    max-height: 300px;
    overflow: hidden;
    text-overflow: ellipsis;
  }

  .icon-size {
    font-size: 40px;
  }

  .text-style {
    text-overflow: ellipsis;

    /* Required for text-overflow to do anything */
    //white-space: nowrap;
    overflow: hidden;
  }

  .spacing {
    margin-bottom: 10px;
  }

  .title-style {
    font-size: 1.25rem;
    margin-bottom: 0rem;
    margin-left: 20px;
  }

</style>
