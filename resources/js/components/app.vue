<template>
  <div class="everything">
    <div class="header">Forum Frontend</div>
    <!--
    <login :auth_user="auser" />
   
        <addtopic :topics="topics" v-on:reload="getList()" />
         -->
    <topiclist :topics="topics" v-on:reload="getList()" />
  </div>
</template>
 
<script>
export default {
  created() {
    this.getList();
  },
  props: ["auth_user"],
  data: function () {
    return {
      auser: this.auth_user,
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
};
</script>
<style>
.everything {
  margin: auto;
  background: #1F1D36;
}
.header {
  padding: 30px;
  text-align: center;
  color: #E9A6A6;
  font-size: 3em;
}
</style>