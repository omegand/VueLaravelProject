<template>
  <div class="everything">
    <div class="heading">
      <h2 id="title">Forum Frontend</h2>
      <!--
        <addpost :topics="topics" v-on:reload="getList()" />
    </div>
    <listview :topics="topics" v-on:reload="getList()" />
    --></div>
    <login :auth_user="auser" />
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
  text-align: center;
}
</style>