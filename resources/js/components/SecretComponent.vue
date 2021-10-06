<template>
  <div class="container">
    <div class="row mt-4">
      <div class="col-6 offset-3">
        <form action="#" @submit.prevent="handleLogin">
          <div class="form-row">
            <input
              type="email"
              name="email"
              class="form-control"
              v-model="formData.email"
            />
          </div>
          <div class="form-row">
            <input
              type="password"
              name="password"
              class="form-control"
              v-model="formData.password"
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
      secrets: [],
      formData: {
        email: "",
        password: "",
      },
    };
  },
  methods: {
    handleLogin() {
      axios.get("/sanctum/csrf-cookie").then((response) => {
        axios.post("/login", this.formData).then((response) => {
          this.getSecrets();
        });
      });
    },
    getSecrets(){
        axios.get('/api/secrets').then(response =>{
            console.log(response);
        })
    }
  },
};
</script>
<style scoped>
.form-row {
  margin-bottom: 12px;
}
</style>
