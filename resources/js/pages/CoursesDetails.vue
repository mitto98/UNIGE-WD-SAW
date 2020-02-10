<template>
  <div class="container">
    <div class="row">
      <div class="col-md-9">
        <h1>Valutazioni e recensioni</h1>
      </div>
      <div class="col-md-3 align-bottom">
        <h5>Dettaglio</h5>
      </div>
    </div>

    <average-rating/>

    <div class="row separe-comments">
      <div class="col-md-9">
        <h2>Commenti : {{comments.length}}</h2>
      </div>
      <div class="col-md-3 align-bottom">
        <h5>Scrivi</h5>
      </div>
      <div style="margin-top: 30px">
        <comments v-for="comment in comments" :key="comment.id" :text="comment.text" :rating="comment.rating"/>

      </div>
    </div>
  </div>
</template>

<script>
  import RatingStar from "../components/General/RatingStar";
  import RatingBar from "../components/General/RatingBar";
  import AverageRating from "../components/Area/CoursesDetails/AverageRating";
  import Comments from "../components/Area/CoursesDetails/Comments";

  export default {
    name: "CoursesDetails",
    components: {Comments, AverageRating, RatingBar, RatingStar},

    data: () => ({
      comments: [
        {
          id: 1,
          text: "Lorem ipsum dolor sit amet, consectetur adipiscing elit. Phasellus vitae nulla feugiat, varius massa ac, tempus nisl. In consequat lorem sit amet faucibus pretium. ",
          rating: 3.5,
        },
        {
          id: 2,
          text: "Cras accumsan dictum nunc at posuere. Aliquam aliquet malesuada blandit. Phasellus faucibus dolor nec turpis iaculis porttitor.",
          rating: 4.8,
        },
        {
          id: 3,
          text: "Etiam iaculis hendrerit congue. Donec malesuada ex a iaculis tincidunt. Aenean vehicula tellus a erat semper varius. Maecenas sit amet mollis felis. Mauris orci metus, varius a pretium id, molestie nec nisi. Vestibulum sapien eros, commodo at nulla in, vulputate auctor ex. Vestibulum pretium enim et lectus pretium, vitae molestie lectus dignissim. ",
          rating: 4,
        },
        {
          id: 4,
          text: "Curabitur sagittis leo in ex cursus molestie. Donec molestie nulla sed venenatis pulvinar. Pellentesque suscipit congue velit eget malesuada. Etiam molestie euismod porta.",
          rating: 2.5,
        },
        {
          id: 5,
          text: "Vivamus mattis efficitur ante eget tristique",
          rating: 5
        },
        {
          id: 6,
          text: "Vivamus eleifend elit quis lorem cursus, quis tincidunt risus luctus. In id molestie tellus, a sollicitudin nisi",
          rating: 4,
        },
        {
          id: 7,
          text: "Donec sollicitudin sem id pulvinar volutpat. Curabitur vel sagittis sem. Morbi quis finibus nibh. Maecenas quis ullamcorper purus, nec porttitor tellus.",
          rating: 5

        },
        {
          id: 8,
          text: "Aenean vulputate in erat ac suscipit. Morbi vel vestibulum turpis. Maecenas sodales id sapien at placerat. Nunc auctor ante auctor dignissim vulputate. Fusce malesuada augue mi, vitae maximus turpis efficitur vel.",
          rating: 5

        },
        {
          id: 9,
          text: "Quisque nisi nibh, luctus porttitor fringilla in, semper vel ligula. Ut sagittis ligula aliquam, luctus quam id, luctus sem.",
          rating: 4
        },
        {
          id: 10,
          text: "Sed non dapibus nibh. Pellentesque non mauris turpis. Cras vulputate sodales eleifend. Morbi ut bibendum tortor. Morbi quis euismod nisi. Etiam eu purus facilisis, sollicitudin nulla eget, maximus sapien",
          rating: 4.5,
        },
      ]
    })
  }
</script>

<style scoped lang="scss">

  .align-bottom {
    margin-top: auto;
  }

  .separe-comments {
    margin-top: 50px;
  }

</style>
