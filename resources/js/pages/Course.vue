<template>
  <div>
    <div v-if="course" class="container">
      <div class="row">
        <div class="col-12 py-5">
          <h1><b class="h1-mugugno">{{course.name}}</b></h1>
          <a :href="`https://corsi.unige.it/${course.id}`" target="_blank">
            {{ $t('course.info') }}
            <font-awesome-icon :icon="faExternalLinkAlt"/>
          </a>
        </div>
      </div>

      <average-rating :average_rating="course.average_rating"
                      :total="comments.length"
                      :ratings="this.ratings"
                      v-model="selectedRating"/>


      <div v-if="!myComment" class="row pt-4 pb-5">
        <div v-if="!is_insert" class="col-12">
          <button type="button"
                  class="btn btn-mugugno-primary write-comment-button"
                  v-on:click="enableInsert">
            {{ isLoggedIn ? $t('course.comments.write_new') : $t('course.comments.log_and_write') }}
            <font-awesome-icon icon="pencil-alt"/>
          </button>

        </div>
        <div v-else class="col-12">
          <insert-comments v-on:saveNewComment="saveNewComment" v-on:closeInsertComment="closeInsertComment"/>
        </div>
      </div>

      <comments v-else :comment="myComment"/>


      <div class="row">
        <comments v-for="comment in displayComments" :key="comment.id" :comment="comment"/>

        <div v-if="showCount < comments.length" class="col-12">
          <button class="btn btn-primary btn-block" @click="showCount = showCount + 5">
            {{$t('course.comments.load_other')}}
          </button>
        </div>
      </div>

    </div>
  </div>
</template>

<script>
  import {faExternalLinkAlt} from '@fortawesome/free-solid-svg-icons';
  import {mapGetters} from 'vuex';
  import RatingStar from '../components/General/RatingStar';
  import AverageRating from '../components/Area/CoursesDetails/AverageRating';
  import Comments from '../components/Area/CoursesDetails/Comments';
  import axios from '../axios';
  import InsertComments from '../components/Area/CoursesDetails/InsertComments';

  export default {
    name: 'CoursesDetails',
    components: {InsertComments, Comments, AverageRating, RatingStar},
    data: () => ({
      isLoading: true,
      is_insert: thereIsACommentInLocalStorage(),
      showCount: 5,
      course: null,
      comments: [],
      ratings: [],
      selectedRating: 0,
    }),

    created() {
      Promise.all([
        axios.get(`/api/course/${this.$route.params.course}`),
        axios.get(`/api/course/${this.$route.params.course}/comments`),
        axios.get(`/api/course/${this.$route.params.course}/ratings_bar`),
      ]).then(([courseReponse, commentsResponse, ratingBarContainer]) => {
        this.course = courseReponse.data;
        this.comments = commentsResponse.data;
        this.ratings = ratingBarContainer.data.reverse();
        this.isLoading = false;
      });
    },

    methods: {
      enableInsert: function() {
        if (this.isLoggedIn)
          this.is_insert = !this.is_insert;
        else
          this.$router.push({name: 'login'});
      },
      closeInsertComment: function() {
        this.is_insert = false;
      },
      saveNewComment: function(new_comment) {
        axios.put('/api/course/' + new_comment?.course_id + '/comments', new_comment).then(response => {
          this.comments.unshift(response.data);
          this.is_insert = false;

          axios.get(`/api/course/${this.$route.params.course}/ratings_bar`).then(response => {
            this.ratings = response.data.reverse();
          });
          axios.get(`/api/course/${this.$route.params.course}`).then(response => {
            this.course = response.data;
          });
        });
      },
    },
    computed: {
      ...mapGetters(['user']),
      ...mapGetters('auth', ['isLoggedIn']),
      faExternalLinkAlt: () => faExternalLinkAlt,
      myComment() {
        if (this.user) {
          return this.comments.find(c => c.user_id === this.user.id);
        }
        return null;
      },
      displayComments() {
        return this.comments.filter(c => !this.selectedRating || c.rating === this.selectedRating)
          .slice(0, this.showCount);
      },
    },
  };

  /**
   * @desc check is there is any element related to a writing comment in the local storage
   * @returns {boolean}
   */
  function thereIsACommentInLocalStorage() {
    let value = false;
    value = value || !([null, '']).includes(localStorage.getItem('comment_title'));
    value = value || !([null, '']).includes(localStorage.getItem('comment_text'));
    value = value || !([null, '']).includes(localStorage.getItem('comment_rating'));
    return value;
  }
</script>

<style scoped lang="scss">

  @import "../../sass/variables";

  .write-comment-button {
    font-size: 15px;
    padding: 0.625em 1.15em;
    color: white;
  }

  .align-bottom {
    margin-top: auto;
  }

  .align-right {
    margin-left: auto;
  }

  hr {
    border: 0;
    border-top: 0.10rem solid rgba(0, 0, 0, 0.1);
  }
</style>
