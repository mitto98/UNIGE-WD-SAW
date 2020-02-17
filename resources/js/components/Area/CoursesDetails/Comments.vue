<template>
  <div>
    <div class="row min-height padding-md" :style="!isLarge?'max-height: 300px;':''">
      <div class="col-12 col-md-12 spacing">
        <div class="align-in-row">
          <font-awesome-icon icon="user" class="icon-size"/>
          <p class="name-style">{{comment.user.name}}</p>
        </div>
      </div>
      <div class=" col-12 col-sm-12">
        <p class="date-style">{{$t('course.comments.last_update')}} : {{comment.updated_at}}</p>
      </div>
      <div class="col-12 col-md-12">
        <div class="row" style="line-height: initial">
          <div class="col-12">
            <rating-star :rating="comment.rating" :large="false"/>
          </div>
          <div class=" col-12  col-md-6">
            <p class="title-style text-style"><b>{{comment.title}}</b></p>
          </div>
        </div>
      </div>
      <div class="col-12 col-md-6">
        <p v-on:click="openComments" class="text-style">{{comment.text}}</p>
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
    props: ["comment"],
    data: () => ({
      isLarge: false
    }),
    methods : {
      openComments : function () {
        this.isLarge = !this.isLarge;
      }
    }
  }
</script>

<style scoped lang="scss">

  $font-title-size: 1.25rem;

  .min-height {
    min-height: 140px;
    overflow: hidden;
    text-overflow: ellipsis;
  }

  .icon-size {
    font-size: 40px;
  }

  .text-style {
    text-overflow: ellipsis;
    word-break: break-all;
    /* Required for text-overflow to do anything */
    //white-space: nowrap;
    overflow: hidden;
  }

  .spacing {
    margin-bottom: 10px;
  }

  .name-style {
    font-size: $font-title-size;
    margin-bottom: 0rem;
    margin-left: 20px;
  }

  .title-style {
    font-size: $font-title-size;
  }

  .half-width {
    width: 50%;
  }
  .date-style{
    font-size: .9rem;
  }

</style>
