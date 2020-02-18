<template>
  <div>
    <div v-if="course" class="container">
      <div class="row">
        <div class="col-12 pt-5">
          <h1><b class="h1-mugugno">{{course.name}}</b></h1>
          <a :href="`https://corsi.unige.it/${course.id}`" target="_blank">
            {{ $t('course.info') }}
            <font-awesome-icon :icon="faExternalLinkAlt"/>
          </a>
        </div>
      </div>

      <div class="row">
        <div class="col-12 col-md-5" style="text-align: center">
          <h2>{{comments.length}} {{ $t('course.ratings') }}</h2>
        </div>
      </div>

      <average-rating :average_rating="course.average_rating" :ratings="this.ratings"/>

      <div v-if="!!myComment" class="row mt-4">
        <div  v-if="!is_insert" class="col-12 align-right">
          <button type="button" class="btn btn-mugugno-primary" v-if="isLoggedIn" v-on:click="enableInsert" style="font-size: 20px">
            <span class="badge">
              {{ $t('course.comments.write_new') }} <font-awesome-icon icon="pencil-alt"/>
            </span>
          </button>
          <router-link :to="{name: 'login'}" class="btn btn-mugugno-primary" v-if="!isLoggedIn" style="font-size: 20px;color:white">
              <span class="badge">
                {{ $t('course.comments.log_and_write') }} <font-awesome-icon icon="pencil-alt"/>
              </span>
          </router-link>
        </div>

<!--        <div class="col-md-9">-->
<!--        </div>-->
        <div v-if="is_insert" class="view-insert">
          <h2>{{ $t('course.comments.revision')}}</h2>
          <insert-comments v-on:saveNewComment="saveNewComment"v-on:closeInsertComment="closeInsertComment"/>
        </div>
      </div>

      <div v-else>
        <comments :comment="myComment"/>
      </div>

      <div class="row mt-4">
          <comments v-for="comment in comments" :key="comment.id" :comment="comment"/>
      </div>
    </div>
  </div>
</template>

<script>
  import {faExternalLinkAlt} from '@fortawesome/free-solid-svg-icons';
  import {mapGetters} from "vuex";
  import RatingStar from "../components/General/RatingStar";
  import RatingBar from "../components/General/RatingBar";
  import AverageRating from "../components/Area/CoursesDetails/AverageRating";
  import Comments from "../components/Area/CoursesDetails/Comments";
  import axios from "../axios";
  import InsertComments from "../components/Area/CoursesDetails/InsertComments";

  export default {
    name: "CoursesDetails",
    components: {InsertComments, Comments, AverageRating, RatingBar, RatingStar},
    methods: {
      enableInsert: function () {
        this.is_insert = !this.is_insert
      },
      closeInsertComment:function(){
        this.is_insert = false
      },
      saveNewComment:function (new_comment) {
        axios.put('/api/course/'+new_comment?.course_id+'/comments',new_comment).then(response => {
          this.comments.unshift(response.data);
          this.is_insert = false;
          axios.get(`/api/course/${this.$route.params.course}/ratings_bar`).then(response =>{
            this.ratings = response.data.reverse();
          });
          axios.get(`/api/course/${this.$route.params.course}`).then(response => {
            this.course = response.data;
          });
        });
      },
    },
    data: () => ({
      is_insert: thereIsACommentInLocalStorage(),
      course: null,
      comments: [],
      ratings: []
    }),
    created() {
      axios.get(`/api/course/${this.$route.params.course}`).then(response => {
        this.course = response.data;
      });
      axios.get(`/api/course/${this.$route.params.course}/comments`).then(response => {
        this.comments = response.data;
      });
      axios.get(`/api/course/${this.$route.params.course}/ratings_bar`).then(response =>{
        this.ratings = response.data.reverse();
      })

    },
    computed: {
      ...mapGetters(['user']),
      ...mapGetters('auth', ["isLoggedIn"]),
      faExternalLinkAlt: () => faExternalLinkAlt,
      myComment() {
        if (this.user) {
          return this.comments.find(c => c.user_id === this.user.id);
        }
        return null;
      }
    }
  }

  /**
   * @desc check is there is any element related to a writing comment in the local storage
   * @returns {boolean}
   */
  function thereIsACommentInLocalStorage() {
    let value = false;
    value = value || !([null, ""]).includes(localStorage.getItem("comment_title"));
    value = value || !([null, ""]).includes(localStorage.getItem("comment_text"));
    value = value || !([null, ""]).includes(localStorage.getItem("comment_rating"));
    return value;
  }
</script>

<style scoped lang="scss">

  @import "../../sass/variables";

  .align-bottom {
    margin-top: auto;
  }

  .align-right {
    margin-left: auto;
  }

  .row {
    margin-top: 1.875rem;
    margin-bottom: 1.875rem;
  }

  hr {
    border: 0;
    border-top: 0.10rem solid rgba(0, 0, 0, 0.1);
  }

  .view-insert {
    animation-duration: 5s;
    animation-name: panel-animation;
    animation-delay: 3s;
  }

  @keyframes panel-animation {
    from {
      height: 0;
    }

    to {
      height: 100%;
    }
  }

</style>
