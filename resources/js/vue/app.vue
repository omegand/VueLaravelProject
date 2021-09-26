<template>
  <div class="everything">
    <div class="heading">
      <h2 id="title">Forum Frontend</h2>
      <add-post-form :posts="posts" v-on:reload="getList()"/>
    </div>

    <list-view :posts="posts" v-on:reload="getList()"/>
  </div>
</template>
 
<script>
import addPostForm from "./addPostForm";
import listView from "./listView";

export default {
  components: {
    addPostForm,
    listView,
  },
  data: function () {
    return {
      posts: [],
    };
  },
  methods: {
    getList() {
      axios
        .get("api/post")
        .then((response) => {
          this.posts = response.data;
        })
        .catch((error) => {
          console.log(error);
        });
    },
  },
  created(){
    this.getList();
  }
};
</script>
<style scoped>
.everything {
  width: 350;
  margin: auto;
}
.heading {
  background: #e6e6e6;
  padding: 10px;
  text-align: center;
}
#title {
  text-align: center;
}
</style>