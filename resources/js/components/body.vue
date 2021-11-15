<template>
  <div class="everything">
    <login v-if="user==null" />
    <addtopic :topics="topics" v-on:reload="getList()" />
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
  data: function () {
    return {
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
  props: ['user']
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