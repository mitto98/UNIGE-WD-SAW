<template>
  <div class="container pt-5 pb-4">
    <h2 style="margin-bottom: 1.5rem"> Chat </h2>
    <div class="row" style="margin-bottom: 1.25rem">
      <search :placeholder="$t('chat.search_user')" class="col-4"/>
    </div>
    <div class="row">
      <div class="col-12 col-sm-4 chat-list no-padding">
        <ul class="list-group">
          <li class="list-group-item no-padding" v-for="i in 50" :key="i">
            <div class="row chat-div">
              <font-awesome-icon icon="user" class="col-2 user-icon"/>
              <div class="col-10 username-style no-padding">
                <p>Davide Cardo</p>
              </div>
            </div>
          </li>
        </ul>
      </div>
      <div class="col-12 col-sm-8  no-padding">
        <div class="chat-messages">
          <div class="messages" v-for="i in 30" :key="i" style="z-index: 80px">
          <span v-if="i%2" class="badge badge-pill badge-primary his-message">
            <p style="margin-left: 20px">Hello. How are you today?</p>
            <span class="time-right">11:00</span>
          </span>
            <span v-if="!(i%2)" class="badge badge-pill badge-secondary my-message">
            <p style="margin-right: 20px">Hello. How are you today?</p>
            <span class="time-left">11:00</span>
          </span>
          </div>
        </div>
        <div class="input-group text-field">
          <div class="input-group-prepend align-bottom">
            <input type="text" class="form-control" placeholder="Messaggio">
            <span class="input-group-text">
              <font-awesome-icon :icon="farPaperPlane"/>
            </span>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>

  import IFTAInput from "../components/IFTAInput";
  import Search from "../components/Home/Search";
  import {faPaperPlane as farPaperPlane} from "@fortawesome/free-regular-svg-icons"

  export default {
    name: "Chat",
    components: {Search, IFTAInput},
    data: () => ({}),
    created() {
    },
    computed: {
      farPaperPlane: () => farPaperPlane,

    }
  }
</script>

<style scoped lang="scss">

  @import "../../sass/variables";

  $chat_height: 650px;
  $messagges-list: 600px;
  $input_messagge_height: $chat_height - $messagges-list;

  .chat-list {
    height: $chat_height;
    overflow: hidden;
    border: 1px solid rgba(0, 0, 0, 0.125)
  }

  .list-group {
    height: 100%;
    overflow-y: scroll;
    display: block;
  }

  .list-group-item {
    border: none;
    height: 4rem !important;
    &:hover {
      cursor: pointer;
      background-color: whitesmoke;
      animation: hoverChatList .3s;
    }
  }

  .chat-messages {
    
    overflow: hidden;
    overflow-y: scroll;
    height: $messagges-list;
    border: 1px solid rgba(0, 0, 0, 0.125);
  }

  .user-chat {
    display: flex;
    flex-direction: row;
  }

  .user-icon {
    font-size: 1.8rem;
    margin-top: auto;
    margin-bottom: auto;
  }

  .username-style {
    margin-top: auto;
    border-bottom: 1px solid rgba(0, 0, 0, 0.125);
  }

  .no-padding {
    padding: 0
  }

  .chat-div {
    height: inherit;
    margin-left: 0;
    margin-right: 0;
  }

  .align-bottom {
    width: 100%;
    z-index: 150;
    margin-top: auto;
  }

  .text-field {
    height: $input_messagge_height;
    margin-top: auto;
    z-index: 100;
  }

  .darker {
    border-color: #ccc;
    background-color: #ddd;
  }

  .container::after {
    content: "";
    clear: both;
    display: table;
  }

  .time-right {
    margin-right: 10px;
    float: right;
    color: #ffffff;
  }

  .time-left {
    margin-left: 10px;
    float: left;
    color: #ffffff;
  }

  .my-message {
    text-align: right;
    width: 50%;
    margin-left: 5px;
    float: right;
  }

  .his-message {
    float: left;
    text-align: left;
    width: 50%;
    margin-left: 5px;
  }

  .badge {
    margin-top: 20px;
    font-size: 1rem
  }

  .form-control{
    height: $input_messagge_height
  }

  @keyframes hoverChatList {
    from {
      background-color: white;
    }
    to {
      background-color: whitesmoke;
    }
  }

</style>
