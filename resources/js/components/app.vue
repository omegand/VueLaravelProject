<template>
  <div class="everything">
    <div class="heading">
      <h2 id="title">Forum Frontend</h2>
    <!--
    <add-post-form :topics="topics" v-on:reload="getList()"/>
    -->
    </div>

    <list-view :topics="topics" v-on:reload="getList()"/>
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
      topics: [],
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
  text-align: left;
}
#title {
  text-align: left;
}
</style>