<template>
  <form @submit.prevent="saveComment">
    <div class="row">
      <div class="col-12 col-md-6">
        <IFTAInput v-model="new_comment.title"  :required="true"  id="title" type="text" :label="$t('course.comments.title')"/>
      </div>
      <div class="col-12 col-md-6">
        <div class="align-in-row ">
          <p class="size-label"><b>{{$t('course.comments.insert.evaluate')}} * :</b></p>
          <rating-star-input :rating="new_comment.rating" :large="false" v-on:updateRatingStar="updateRatingStar"/>
        </div>
      </div>
      <div class="col-12 col-md-12">
        <IFTAInput v-model="new_comment.text" id="title" type="text" :required="true" :label="$t('course.comments.description')"
                   :rows="3"/>
      </div>
      <div class="col-12">
        <button type="submit" class="btn btn-mugugno-primary float-right">
          <span class="badge">
            {{ $t('save') }} <font-awesome-icon icon="save"/>
          </span>
        </button>
        <button type="button" class="btn btn-mugugno-error float-right mr-3">
          <span class="badge">
            {{ $t('delete') }} <font-awesome-icon icon="times-circle"/>
          </span>
        </button>
      </div>
    </div>
    <hr/>
  </form>
</template>

<script>
  import RatingStar from "../../General/RatingStar";
  import IFTAInput from "../../../components/IFTAInput";
  import {mapGetters} from "vuex";
  import RatingStarInput from "./RatingStarInput";

  export default {
    name: "InsertComments",
    components: {RatingStarInput, RatingStar,IFTAInput},
    created(){
      this.new_comment.course_id = this.$route.params.course;
      this.new_comment.user_id = this.user?.id
    },
    computed:{
      ...mapGetters(["user"]),
    },
    data: () => ({
      new_comment: {
        title: "",
        text: "",
        rating: 0,
        user_id: null,
        course_id : null
      }
    }),
    methods :{
      saveComment: function () {
        this.$emit('saveNewComment',this.new_comment)
      },
      updateRatingStar : function (rating) {
        this.new_comment.rating = rating
      }
    }
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

  .size-label{
    font-size: 0.9rem
  }

</style>
