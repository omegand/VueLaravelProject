<template>
  <div class="container">
    <div class="row mt-4">
      <div class="col-6 offset-3" v-if="topics.length == 0">
        <h3>Login</h3>
        <form action="#" @submit.prevent="handleLogin">
          <div class="form-row">
            <input
              type="email"
              name="email"
              class="form-control"
              v-model="formData.email"
              placeholder="Email"
            />
          </div>
          <div class="form-row">
            <input
              type="password"
              name="password"
              class="form-control"
              v-model="formData.password"
              placeholder="Password"
            />
          </div>
          <div class="form-row">
            <button type="submit" class="btn btn-primary">Sign in</button>
          </div>
        </form>
      </div>
      <div v-if="topics.length > 0">
        <div class="topic" v-for="(topic, index) in topics" :key="index">
          <h4>Post Title:</h4>
          {{ topic.title }}
          <h6>Post Description:</h6>
          {{ topic.body }}
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      result: "",
      topics: [],
      formData: {
        email: "",
        password: "",
      },
    };
  },
  methods: {
    handleLogin() {
      axios.get("/sanctum/csrf-cookie").then((response) => {
        axios
          .post("/login", this.formData)
          .then((response) => {
            console.log("User signed in!");
          })
          .catch((error) => console.log(error)); // credentials didn't match
      });
    },
    getTopics() {
      axios
        .get("/api/topic/post")
        .then((response) => (this.topics = response.data));
    },
  },
};
</script>
<style scoped>
.form-row {
  margin-bottom: 12px;
}
.topic {
  width: fit-content;
  border: 3px solid black;
  padding: 5px;
  margin: 10px;
}
</style>
