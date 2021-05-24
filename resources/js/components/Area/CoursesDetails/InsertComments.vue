<template>
  <form @submit.prevent="saveComment" class="row">
    <div class="col-12">
      <h2>{{ $t('course.comments.revision')}}</h2></div>
    <div class="col-12 col-md-6">
      <IFTAInput v-model="new_comment.title" :error="titleError" :required="true" id="title" type="text"
                 :label="$t('course.comments.title')"/>
    </div>

    <div class="col-12 col-md-6">
      <div class="align-in-row ">
        <p class="size-label"><b>{{$t('course.comments.insert.evaluate')}} * :</b></p>
        <rating-star-input v-model="new_comment.rating" :large="false"/>
      </div>
    </div>

    <div class="col-12">
      <IFTAInput v-model="new_comment.text" id="title" type="text" :required="true"
                 :label="$t('course.comments.description')"
                 :rows="4"/>
    </div>

    <div class="col-12">
      <button type="submit" class="btn btn-mugugno-primary float-right">
          <span class="badge">
            {{ $t('save') }} <font-awesome-icon icon="save"/>
          </span>
      </button>
      <button type="button" class="btn btn-mugugno-error float-right mr-3" @click="emitEventClose">
          <span class="badge">
            {{ $t('cancel') }} <font-awesome-icon icon="times-circle"/>
          </span>
      </button>
    </div>
    <hr/>
  </form>
</template>

<script>
  import RatingStar from '../../General/RatingStar';
  import IFTAInput from '../../../components/IFTAInput';
  import {mapGetters} from 'vuex';
  import RatingStarInput from './RatingStarInput';

  export default {
    name: 'InsertComments',
    components: {RatingStarInput, RatingStar, IFTAInput},
    created() {
      this.new_comment.course_id = this.$route.params.course;
      this.new_comment.user_id = this.user?.id;
    },
    computed: {
      ...mapGetters(['user']),
      titleError() {
        if (this.new_comment.title.length > 128)
          return 'Titolo troppo lungo';
      },
    },
    watch: {
      'new_comment.title': {
        handler: function() {
          //console.log("Title changed");
          localStorage.setItem('comment_title', this.new_comment.title);
        },
        deep: true,
      },
      'new_comment.text': {
        handler: function() {
          //console.log("Text changed");
          localStorage.setItem('comment_text', this.new_comment.text);
        },
        deep: true,
      },
      'new_comment.rating': {
        handler: function() {
          //console.log("Rating changed");
          localStorage.setItem('comment_rating', this.new_comment.rating.toString());
        },
        deep: true,
      },
    },
    data: () => ({
      new_comment: {
        title: localStorage.getItem('comment_title') || '',
        text: localStorage.getItem('comment_text') || '',
        rating: Number.parseInt(localStorage.getItem('comment_rating') || '0'),
        user_id: null,
        course_id: null,
      },
    }),
    methods: {
      saveComment: function() {
        this.$emit('saveNewComment', this.new_comment);
        this.emptyLocalStorage();
      },
      emptyLocalStorage() {
        localStorage.removeItem('comment_title');
        localStorage.removeItem('comment_text');
        localStorage.removeItem('comment_rating');
        this.new_comment = {
          title: '',
          text: '',
          rating: 0,
        };
      },
      emitEventClose: function() {
        this.emptyLocalStorage();
        this.$emit('closeInsertComment');
      },
      updateRatingStar: function(rating) {
        this.new_comment.rating = rating;
      },
    },
  };
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

  .align-right-button {
    text-align: end
  }

  .size-label {
    font-size: 0.9rem
  }

</style>
