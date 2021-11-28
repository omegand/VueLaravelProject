<template>
  <div class="container">
    <div class="row mt-4">
      <div class="col-6 offset-3" v-if="this.$user.admin">
        <h3 style="color: #e9a6a6; text-align: center">Adding a Topic</h3>
        <form @submit="onSubmit">
          <div class="form-row">
            <input
              v-model="topic.title"
              name="title"
              class="form-control"
              placeholder="Title..."
            />
          </div>
          <div class="form-row">
            <input
              v-model="topic.desc"
              name="desc"
              class="form-control"
              placeholder="Description..."
            />
          </div>
          <div class="form-row">
            <button type="submit" class="btn btn-primary">Submit</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "addTopic",
  data: function () {
    return {
      topic: {
        title: "",
        desc: "",
      },
    };
  },
  methods: {
    onSubmit(e) {
      e.preventDefault();
      if (this.topic.title == "") {
        alert("Title is empty.");
        return;
      }
      if (this.topic.desc == "") {
        alert("Description is empty.");
        return;
      }
      axios
        .post("api/topic", {
          title: this.topic.title,
          desc: this.topic.desc,
        })
        .then((response) => {
          if (response.status == 201) {
            this.topic.title = "";
            this.topic.desc = "";
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
.form-row {
  margin-bottom: 12px;
  text-align: center;
}
</style>