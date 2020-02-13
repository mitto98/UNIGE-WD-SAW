<template>
  <div class="padding-md">
    <div class="row">
      <div class="col-12 col-md-6">
        <label for="title"><b>{{$t('course.comments.insert.title')}} :</b></label>
        <input type="text" v-model="new_comment.title" id="title" class="form-control"
               :placeholder="$t('course.comments.title')">
      </div>
      <div class="col-12 col-md-12">
        <div class="align-in-row ">
          <p><b>{{$t('course.comments.insert.touch')}} :</b></p>
          <rating-star :rating="new_comment.rating" :large="false"/>
        </div>
      </div>
      <div class="col-12 col-md-12">
        <label for="text"><b>{{$t('course.comments.insert.description')}} :</b></label>
        <textarea id="text" v-model="new_comment.message" class="form-control" rows="3"
                  :placeholder="$t('course.comments.description')"></textarea>
      </div>
    </div>
    <div class="row">
      <div class="col-6 col-md-6">
        <button type="button" class="btn btn-mugugno-error">
          <span class="badge">
            {{ $t('delete') }} <font-awesome-icon icon="times-circle"/>
          </span>
        </button>
      </div>
      <div class="col-6 col-md-6 align-right-button">
        <button type="button" class="btn btn-mugugno-primary">
          <span class="badge">
            {{ $t('save') }} <font-awesome-icon icon="save"/>
          </span>
        </button>
      </div>
    </div>
    <hr/>
  </div>
</template>

<script>
  import RatingStar from "../../General/RatingStar";

  export default {
    name: "InsertComments",
    components: {RatingStar},
    data: () => ({
      new_comment: {
        title: "",
        text: "",
        rating: 0,
      }
    })
  }
</script>

<style scoped lang="scss">

  .p-style {
    font-size: 1.25rem;
    margin-bottom: 0rem;
    margin-left: 20px;
  }

  .col-12, .col-md-12, .col-md-6 {
    margin-bottom: 1rem;
  }
  .align-right-button{
    text-align: end
  }

</style>
