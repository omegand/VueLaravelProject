<template>
  <div style="background: #1f1d36; padding: 9em">
    <div class="row mt-4">
      <div class="col-6 offset-3" v-if="this.$user == ''">
        <h3 class="text2">Login Form</h3>
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
      <div class="col-6 offset-3" v-else>
        <div class="text">
          <h1>You are logged in!</h1>
        </div>
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
      if (this.formData.password == "" || this.formData.email == "") {
        alert("Fill out all the fields.");
        return;
      }
      axios.get("/sanctum/csrf-cookie").then((response) => {
        axios
          .post("/login", this.formData)
          .then((response) => {
            console.log(response);
            this.$forceUpdate();
            this.$router.go();
          })
          .catch((error) => {
            alert("Neteisingi duomenys");
          });
      });
    },
  },

  created() {
    console.log(this.$user);
  },
};
</script>
<style scoped>
.form-row {
  margin-bottom: 12px;
}
.text {
  color: #ffc2b4;
  text-align: center;
}
.text2 {
  color: #ffc2b4;
  text-align: left;
}
</style>
