<template>
  <div class="padding-md">
    <div class="row">
      <div class="col-12 col-md-6">
        <IFTAInput v-model="new_comment.title"  :required="true"  id="title" type="text" :label="$t('course.comments.title')"/>
      </div>
      <div class="col-12 col-md-6">
        <div class="align-in-row ">
          <p class="size-label"><b>{{$t('course.comments.insert.evaluate')}} * :</b></p>
          <rating-star :rating="new_comment.rating" :large="false"/>
        </div>
      </div>
      <div class="col-12 col-md-12">
        <IFTAInput v-model="new_comment.text" id="title" type="text" :required="true" :label="$t('course.comments.description')"
                   :rows="3"/>
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
        <button type="button" class="btn btn-mugugno-primary" @click="saveComment">
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
  import IFTAInput from "../../../components/IFTAInput";
  import {mapGetters} from "vuex";

  export default {
    name: "InsertComments",
    components: {RatingStar,IFTAInput},
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
        rating: 3,
        user_id: null,
        course_id : null
      }
    }),
    methods :{
      saveComment: function () {
        this.$emit('saveNewComment',this.new_comment)
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
