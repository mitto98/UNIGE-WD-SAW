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
          <h2>{{ $t('course.ratings') }}</h2>
        </div>
      </div>

      <average-rating/>

      <div class="row">
        <div class="col-12 align-right ">
          <button type="button" class="btn btn-mugugno-primary" v-on:click="enableInsert" style="font-size: 20px">
          <span class="badge">
            {{ $t('course.comments.write_new') }} <font-awesome-icon icon="pencil-alt"/>
          </span>
          </button>
        </div>
      </div>

      <div class="row separe-comments">
        <div class="col-md-9">
          <h2>{{ $t('course.comments.revision')}} : {{comments.length}}</h2>
        </div>
        <div v-if="is_insert" class="view-insert">
          <insert-comments />
        </div>
        <div>
          <comments v-for="comment in comments" :key="comment.id" :comment="comment"/>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
  import {faExternalLinkAlt} from '@fortawesome/free-solid-svg-icons';

  import RatingStar from "../components/General/RatingStar";
  import RatingBar from "../components/General/RatingBar";
  import AverageRating from "../components/Area/CoursesDetails/AverageRating";
  import Comments from "../components/Area/CoursesDetails/Comments";
  import axios from "../axios";
  import InsertComments from "../components/Area/CoursesDetails/InsertComments";

  export default {
    name: "CoursesDetails",
    components: {InsertComments, Comments, AverageRating, RatingBar, RatingStar},
    methods:{
      enableInsert:function () {
        this.is_insert = !this.is_insert
      }
    },
    data: () => ({
      is_insert:false,
      course: null,
      comments: [
        {
          id: 1,
          title: "Bello ma",
          name: "Davide Cardo",
          text: "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus vitae nulla feugiat, varius massa ac, tempus nisl. In consequat lorem sit amet faucibus pretium. ",
          rating: 3.5,
        },
        {
          id: 2,
          title: "Molto soddisfatto",
          name: "Mattia Dapino",
          text: "Cras accumsan dictum nunc at posuere. Aliquam aliquet malesuada blandit. Phasellus faucibus dolor nec turpis iaculis porttitor.",
          rating: 4.8,
        },
        {
          id: 3,
          title: "Darei fuoco al dibris",
          name: "Nome Test",
          text: "Etiam iaculis hendrerit congue. Donec malesuada ex a iaculis tincidunt. Aenean vehicula tellus a erat semper varius. Maecenas sit amet mollis felis. Mauris orci metus, varius a pretium id, molestie nec nisi. Vestibulum sapien eros, commodo at nulla in, vulputate auctor ex. Vestibulum pretium enim et lectus pretium, vitae molestie lectus dignissim. ",
          rating: 4,
        },
        {
          id: 4,
          title: "Scrivo un titolo",
          name: "Nome Cognome",
          text: "Curabitur sagittis leo in ex cursus molestie. Donec molestie nulla sed venenatis pulvinar. Pellentesque suscipit congue velit eget malesuada. Etiam molestie euismod porta.",
          rating: 2.5,
        },
        {
          id: 5,
          title: "Per me è ok",
          name: "Prova Nome",
          text: "Vivamus mattis efficitur ante eget tristique",
          rating: 5
        },
        {
          id: 6,
          title: "Molto contento del corso",
          name: "Riccardo Di Sabatino",
          text: "Vivamus eleifend elit quis lorem cursus, quis tincidunt risus luctus. In id molestie tellus, a sollicitudin nisi",
          rating: 4,
        },
        {
          id: 7,
          title: "Io soddisfatten de lu corsen",
          name: "Lorem Ipsum",
          text: "Donec sollicitudin sem id pulvinar volutpat. Curabitur vel sagittis sem. Morbi quis finibus nibh. Maecenas quis ullamcorper purus, nec porttitor tellus.",
          rating: 5

        },
        {
          id: 8,
          title: "Tanta shaize",
          name: "Asuu Usaa",
          text: "Aenean vulputate in erat ac suscipit. Morbi vel vestibulum turpis. Maecenas sodales id sapien at placerat. Nunc auctor ante auctor dignissim vulputate. Fusce malesuada augue mi, vitae maximus turpis efficitur vel.",
          rating: 5

        },
        {
          id: 9,
          title: "Accettabile",
          name:"Donaldo Trampolino",
          text: "Quisque nisi nibh, luctus porttitor fringilla in, semper vel ligula. Ut sagittis ligula aliquam, luctus quam id, luctus sem.",
          rating: 4
        },
        {
          id: 10,
          title: "AOO",
          name: "Silvio Berluscotti",
          text: "Sed non dapibus nibh. Pellentesque non mauris turpis. Cras vulputate sodales eleifend. Morbi ut bibendum tortor. Morbi quis euismod nisi. Etiam eu purus facilisis, sollicitudin nulla eget, maximus sapien",
          rating: 4.5,
        },
      ]
    }),
    created() {
      axios.get(`/api/course/${this.$route.params.course}`).then(response => {
        this.course = response.data;
      })
    },
    computed: {
      faExternalLinkAlt: () => faExternalLinkAlt,
    }
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

  .separe-comments {
    margin-top: 3rem;
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
