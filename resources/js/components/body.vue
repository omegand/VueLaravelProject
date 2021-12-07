<template>
  <div>
    <img
      class="image"
      src="https://i.imgur.com/lNWURRn.png"
      referrerpolicy="no-referrer"
    />
    <div class="row" style="background: #1f1d36">
      <div class="col-md-3 offset-md-1">
        <topic
          v-for="(topic, index) in topics"
          :key="index"
          :topic="topic"
          v-on:changed="getList"
          @clicked="clickedPost(topic)"
        />
      </div>
      <transition name="fade">
        <div v-if="clicked" class="col-md-5 offset-md-1">
          <post
            v-for="(post, index) in posts"
            :key="index"
            :post="post"
            v-on:changed="updatePosts"
          />
        </div>
      </transition>
    </div>
  </div>
</template>
 
<script>
export default {
  created() {
    this.getList();
  },
  data: function () {
    return {
      topics: [],
      posts: [],
      clicked: false,
      savedTopicId: -1,
    };
  },
  methods: {
    updatePosts() {
      this.getPostList(this.savedTopicId);
    },
    clickedPost(topic) {
      this.clicked = !this.clicked;
      this.getPostList(topic.id);
    },
    getList() {
      this.topics = [];
      axios
        .get("api/topic")
        .then((response) => {
          this.topics = response.data;
        })
        .catch((error) => {
          console.log(error);
        });
    },
    getPostList(id) {
      this.posts = [];
      this.savedTopicId = id;
      axios
        .get("api/topic/" + id + "/post")
        .then((response) => {
          this.posts = response.data;
        })
        .catch((error) => {});
    },
    getBoth() {
      this.getList();
      this.getPostList();
    },
  },
};
</script>
<style >
.fade-enter-active,
.fade-leave-active {
  transition: all 1s ease-in-out;
}
.fade-enter,
.fade-leave-to {
  opacity: 0;
  transform: translateX(-200px);
}
.image {
  max-width: 100%;
  width: 100%;
}
</style>