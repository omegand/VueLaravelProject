<template>
 <div class="container">
    <div class="row mt-4">
      <div class="col-6 offset-3" v-if="auth_user == null">
        <h3>Add Topic:</h3>
        <form>
          <div class="form-row">
            <input
              type="title"
              name="title"
              class="form-control"
              placeholder="Title..."
            />
          </div>
          <div class="form-row">
            <input
              type="desc"
              name="desc"
              class="form-control"
              placeholder="Description..."
            />
          </div>
          <div class="form-row">
            <button type="submit" class="btn btn-primary">Sign in</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: 'addTopic',
  data: function () {
    return {
      post: {
        title: "",
        body: "",
      },
    };
  },
  methods: {
    addPost() {
      if (this.post.title == "") {
        return;
      }
      axios
        .post("api/post", {
          post: this.post,
        })
        .then((response) => {
          if (response.status == 201) {
            this.post.title = "";
            this.$emit('reload');
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
}
</style>