<template>
  <div v-if="this.$user != ''" class="row" style="background: #1f1d36">
    <div class="col-4 offset-4 mt-5 mb-5">
      <h3 style="color: #e9a6a6; text-align: center">Adding a post</h3>
      <form @submit="onSubmit">
        <div class="form-row">
          <input
            v-model="post.title"
            name="title"
            class="form-control"
            placeholder="Title..."
          />
        </div>
        <div class="form-row">
          <input
            v-model="post.body"
            name="body"
            class="form-control"
            placeholder="Body..."
          />
        </div>
        <div class="form-row">
          <select v-model="post.topicid" class="form-control form-control-md">
            <option v-for="(topic, index) in topics" :key="index">
              {{ topic.title }}
            </option>
          </select>
        </div>
        <div class="form-row">
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </form>
    </div>
  </div>
  <div v-else class="text">You do not have access to this page.</div>
</template>

<script>
export default {
  created() {
    this.getList();
    console.log(this.$user.id);
  },
  name: "addpost",
  data: function () {
    return {
      topics: [],
      post: {
        title: "",
        body: "",
        topicid: "",
      },
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
    onSubmit(e) {
      e.preventDefault();
      if (this.post.title == "") {
        alert("Title is empty.");
        return;
      }
      if (this.post.body == "") {
        alert("Body is empty.");
        return;
      }
      if (this.post.topicid == "") {
        alert("No selected topic.");
        return;
      }
      this.post.topicid = this.topics.find(
        (x) => x.title === this.post.topicid
      ).id;
      axios
        .post("api/topic/post", {
          title: this.post.title,
          body: this.post.body,
          topicid: this.post.topicid,
          userid: this.$user.id,
        })
        .then((response) => {
          this.post.title = "";
          this.post.body = "";
          this.$forceUpdate();
        })
        .catch((error) => {
          console.log(error);
        });
    },
  },
};
</script>
<style scoped>
.row {
  text-align: center;
}
.form-row {
  margin-bottom: 12px;
  text-align: center;
}
.text {
  color: #ffc2b4;
  background: #1f1d36;
  text-align: center;
  font-size: 3.6em;
  padding: 6em;
}
</style>