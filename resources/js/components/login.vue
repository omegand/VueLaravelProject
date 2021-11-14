<template>
  <div class="container">
    <div class="row mt-4">
      <div class="col-6 offset-3" v-if="auth_user == null">
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
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
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
            console.log(response);
          })
          .catch((error) => console.log(error));
      });
    },
    getTopics() {
      axios
        .get("/api/user/post")
        .then((response) => (this.topics = response.data));
    },
  },
  props: ["auth_user"],
  created() {
    console.log(this.auth_user);
  },
};
</script>
<style scoped>
.form-row {
  margin-bottom: 12px;
}
</style>
