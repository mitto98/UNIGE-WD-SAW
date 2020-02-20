<template>
  <div class="container pt-5 pb-4">
    <h2 style="margin-bottom: 1.5rem"> Chat </h2>
    <div class="row" style="margin-bottom: 1.25rem">
      <search v-model="searchValue" :placeholder="$t('chat.search_user')" class="col-4"/>
    </div>
    <div class="row">
      <div class="col-12 col-sm-4 chat-list no-padding">
        <ul class="list-group">
          <li class="list-group-item no-padding" v-for="user in enabledUsers" :key="user.id" @click="getMessages(user.id)">
            <div class="row chat-div" :class="getClass(user.id)">
              <v-gravatar :email="user.email" class="col-2 user-icon" style="border-radius: 50%"/>
              <div class="col-10 username-style no-padding">
                <p>{{user.name}}</p>
              </div>
            </div>
          </li>
        </ul>
      </div>
      <div class="col-12 col-sm-8  no-padding">
        <div class="chat-messages">
          <div class="messages" v-for="message in messages" :key="message.id" style="z-index: 80">
          <span v-if="user.id === message.receiver_id" class="badge badge-pill badge-primary his-message">
            <p style="margin-left: 20px">{{message.text}}</p>
            <span class="time-right">{{message.created_at}}</span>
          </span>
            <span v-else class="badge badge-pill badge-secondary my-message">
            <p style="margin-right: 20px">{{message.text}}</p>
            <span class="time-left">{{message.created_at}}</span>
          </span>
          </div>
        </div>
        <div class="input-group text-field">
          <form class="input-group-prepend align-bottom" @submit.prevent="sendMessage">
            <input v-model="currentMessage" type="text" class="form-control" placeholder="Messaggio">
            <span class="input-group-text" type="submit">
              <font-awesome-icon :icon="farPaperPlane"/>
            </span>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>

<script>

  import IFTAInput from "../components/IFTAInput";
  import Search from "../components/Home/Search";
  import {faPaperPlane as farPaperPlane} from "@fortawesome/free-regular-svg-icons"
  import axios from "../axios";
  import {mapGetters} from "vuex";

  export default {
    name: "Chat",
    components: {Search, IFTAInput},
    data: () => ({
      users: [],
      messages: [],
      currentMessage: "",
      currentUserId: 0,
      searchValue: "",
      intervalActive: false,
      interval: null
    }),
    updated() {
      if(this.currentUserId!==0 && !this.intervalActive) {
        this.intervalActive = true;
        this.interval = setInterval(() => {
          axios.get("/api/chat/" + this.currentUserId).then((response) => this.messages = response.data)
        },1500)
      }
    },
    destroyed() {
      clearInterval(this.interval);
    },
    created() {
      axios.get("/api/user/all").then((response) => {
        this.users = response.data;
        //this.currentUserId = response.data[0];
      });
    },
    computed: {
      ...mapGetters(['user']),
      farPaperPlane: () => farPaperPlane,
      enabledUsers: function() {
        return this.users.filter((u) => {
          return u.name.toLowerCase().includes(this.searchValue.toLowerCase()) && this.user.id !== u.id
        })
      }
    },
    methods: {
      getMessages(user) {
        this.currentUserId = user;
        axios.get("/api/chat/" + this.currentUserId).then((response) => this.messages = response.data)
      },
      sendMessage() {
        axios.put("/api/chat/" + this.currentUserId,
          {
            text: this.currentMessage,
            receiver_id: this.currentUserId,
          }).then(() => {
            this.currentMessage = "";
            this.getMessages(this.currentUserId)
        })
      },
      getClass(id) {
        if(id === this.currentUserId) {
          return "selected"
        }
      }
    }
  }
</script>

<style scoped lang="scss">

  @import "../../sass/variables";

  $chat_height: 650px;
  $messagges-list: 600px;
  $input_messagge_height: $chat_height - $messagges-list;

  .selected {
    background-color: $primary-lightgray
  }

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

  .form-control {
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
