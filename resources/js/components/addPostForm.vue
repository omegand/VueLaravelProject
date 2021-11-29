<template>
  <div>
    <div v-if="this.$user.admin" class="row" style="background: #1f1d36">
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
            <b-form-select v-model="selected" :options="topics"></b-form-select>
          </div>
          <div class="form-row">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </form>
      </div>
    </div>
    <div v-else class="text">You do not have access to this page.</div>
  </div>
</template>

<script>
export default {
  created() {
    this.getList();
    console.log(this.topics);
  },
  name: "addpost",
  data: function () {
    return {
      selected: null,
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
      axios
        .post("api/topic/post", {
          title: this.post.title,
          body: this.post.body,
        })
        .then((response) => {
          if (response.status == 201) {
            this.post.title = "";
            this.post.body = "";
            this.$forceUpdate();
          }
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