<template>
  <div class="row" style="background: #1f1d36">
    <div class="col-md-3 offset-md-4">
      <user
        v-for="(user, index) in users"
        :key="index"
        :user="user"
        v-on:changed="getUsers"
      />
    </div>
  </div>
</template>

<script>
export default {
  created() {
    this.getUsers();
  },
  data: function () {
    return {
      users: [],
    };
  },
  methods: {
    getUsers() {
      this.users = [];
      axios
        .get("api/user")
        .then((response) => {
          this.users = response.data;
        })
        .catch((error) => {
          console.log(error);
        });
    },
  },
};
</script>

<style scoped>
</style>
