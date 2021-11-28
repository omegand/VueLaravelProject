<template>
  <div>
    <topiclist :topics="topics" :posts="posts" v-on:reload="getBoth()" />
  </div>
</template>
 
<script>
export default {
  created() {
    this.getList();
    this.getPostList();
  },
  data: function () {
    return {
      topics: [],
      posts: [],
    };
  },
  methods: {
    getList() {
      axios
        .get("api/topic")
        .then((response) => {
          this.topics = response.data;
        })
        .catch((error) => {
          console.log(error);
        });
    },
    getPostList() {
      axios
        .get("api/topic/post")
        .then((response) => {
          this.posts = response.data;
        })
        .catch((error) => {
          console.log(error);
        });
    },
    getBoth() {
      this.getList();
      this.getPostList();
    },
  },
};
</script>
<style >
.everything {
  background: #1f1d36;
  position: fixed;
  width: 100%;
  height: 100%;
}
</style>