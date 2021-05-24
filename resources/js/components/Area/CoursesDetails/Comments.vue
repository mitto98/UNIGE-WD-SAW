<template>
  <div class="col-12">
    <div class="row min-height pb-4">
      <div class="col-12 col-md-12 spacing">
        <div class="align-in-row">
          <font-awesome-icon icon="user" class="icon-size"/>
          <p class="name-style">{{comment.user.name}}</p>
        </div>
      </div>

      <div class="col-12 col-md-12">
        <div class="row" style="line-height: initial">
          <div class="col-12">
            <rating-star :rating="comment.rating" :large="false"/>
          </div>
          <div class="col-12">
            <p class="title-style text-style"><b>{{comment.title}}</b></p>
          </div>
        </div>
      </div>

      <div class="col-12 col-md-8">
        <p class="text-style">
          {{commentText}}
          <button type="button" class="btn btn-link p-0" v-if="isTooLong" @click="toggleCommitExpand">
          <span v-if="isExpanded">
            {{$t('course.comments.show_less')}} <font-awesome-icon :icon="faAngleUp"/>
          </span>
            <span v-else>
            {{$t('course.comments.show_more')}} <font-awesome-icon :icon="faAngleDown"/>
          </span>
          </button>
        </p>
      </div>
      <div class="col-12">
        <p class="text-muted date-style">
          {{$t('course.comments.last_update')}} : {{formatDate(comment.updated_at)}}
        </p>
      </div>
    </div>

  </div>
</template>

<script>
  import moment from 'moment';
  import RatingStar from '../../General/RatingStar';
  import {faAngleDown, faAngleUp} from '@fortawesome/free-solid-svg-icons';

  export default {
    name: 'Comments',
    components: {RatingStar},
    props: ['comment'],
    data: () => ({
      isExpanded: false,
    }),
    computed: {
      faAngleDown: () => faAngleDown,
      faAngleUp: () => faAngleUp,
      commentText() {
        if (this.isTooLong && !this.isExpanded)
          return this.comment.text.substr(0, 250) + '...';
        return this.comment.text;
      },
      isTooLong() {
        return this.comment.text.length > 250;
      },
    },
    methods: {
      toggleCommitExpand: function() {
        this.isExpanded = !this.isExpanded;
      },
      formatDate(date) {
        return moment(date).format('D/MM/YYYY H:mm');
      },
    },
  };
</script>

<style scoped lang="scss">

  $font-title-size: 1.25rem;

  .icon-size {
    font-size: 40px;
  }

  .text-style {
    text-overflow: ellipsis;
    word-break: break-all;
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

  .date-style {
    font-size: .9rem;
  }

</style>
