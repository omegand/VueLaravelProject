<template>
  <div style="background: #1f1d36; padding: 9em">
    <div class="col-4 offset-4 mt-5 mb-5">
      <h3 style="color: #e9a6a6; text-align: center">Registration form</h3>
      <form @submit="onSubmit">
        <div class="form-row">
          <input
            v-model="newuser.name"
            name="name"
            class="form-control"
            placeholder="Name..."
          />
        </div>
        <div class="form-row">
          <input
            v-model="newuser.email"
            name="email"
            class="form-control"
            placeholder="Email..."
          />
        </div>
        <div class="form-row">
          <input
            v-model="newuser.password"
            name="password"
            class="form-control"
            placeholder="Password..."
          />
        </div>
        <div class="form-row">
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </form>
    </div>
  </div>
</template>

<script>
export default {
  data: function () {
    return {
      newuser: {
        name: "",
        email: "",
        password: "",
      },
    };
  },
  methods: {
    onSubmit(e) {
      e.preventDefault();
      if (this.newuser.name == "") {
        alert("name is empty.");
        return;
      }
      if (this.newuser.email == "") {
        alert("email is empty.");
        return;
      }
      if (this.newuser.password == "") {
        alert("password is empty.");
        return;
      }
      axios
        .post("api/user", {
          name: this.newuser.name,
          email: this.newuser.email,
          password: this.newuser.password,
        })
        .then(() => {
          alert("Sucessfully created, you can now log in.");
          this.$router.push("home");
        })
        .catch(() => {
          alert("User already exists.");
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