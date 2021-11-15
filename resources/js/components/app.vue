<template>
  <div class="everything">
    <div class="header">Forum Frontend</div>
    <!--
    <login :auth_user="auser" />
   
        <addtopic :topics="topics" v-on:reload="getList()" />
         -->
    <addtopic />
    <div style="text-align: center">
      <Button
        @toggle="toggleTopicList"
        :text="showlist ? 'Close' : 'Show'"
        :class="showlist ? 'btn btn-success' : 'btn btn-dark'"
      />
    </div>
    <div v-if="showlist" class="row">
      <topiclist :topics="topics" v-on:reload="getList()" />
    </div>
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
      showlist: false,
    };
  },
  methods: {
    toggleTopicList() {
      this.showlist = !this.showlist;
    },
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
  background: #1f1d36;
  position: fixed;
  width: 100%;
  height: 100%;
}
.header {
  padding: 30px;
  text-align: center;
  color: #e9a6a6;
  font-size: 3em;
}
</style>