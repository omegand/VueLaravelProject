<template>
  <div style="background: #3f3351">
    <b-navbar toggleable="lg" type="dark" variant="transparent">
      <b-navbar-toggle target="nav-collapse"></b-navbar-toggle>
      <b-collapse id="nav-collapse" is-nav>
        <b-navbar-brand>
          <router-link style="text-decoration: none; color: inherit" to="/">
            <img
              src="https://i.imgur.com/SnXxX7a.png"
              referrerpolicy="no-referrer"
            />
          </router-link>
        </b-navbar-brand>

        <b-navbar-nav>
          <b-nav-item>
            <router-link style="text-decoration: none; color: inherit" to="/">
              Home
            </router-link></b-nav-item
          >
          <b-nav-item v-if="this.$user.admin">
            <router-link
              style="text-decoration: none; color: inherit"
              to="/addtopic"
            >
              AddTopic
            </router-link>
          </b-nav-item>
          <b-nav-item v-if="this.$user != ''">
            <router-link
              style="text-decoration: none; color: inherit"
              to="/addpost"
            >
              AddPost
            </router-link>
          </b-nav-item>
          <b-nav-item v-if="this.$user.admin">
            <router-link
              style="text-decoration: none; color: inherit"
              to="/users"
            >
              UserList
            </router-link>
          </b-nav-item>
        </b-navbar-nav>
        <b-navbar-nav class="ml">
          <b-nav-item-dropdown left>
            <template #button-content> User </template>
            <b-dropdown-item v-if="this.$user == ''">
              <router-link
                style="text-decoration: none; color: inherit; font-size: 1em"
                to="/login"
              >
                Login
              </router-link>
            </b-dropdown-item>
            <b-dropdown-item v-if="this.$user == ''">
              <router-link
                style="text-decoration: none; color: inherit; font-size: 1em"
                to="/register"
              >
                Register
              </router-link>
            </b-dropdown-item>
            <b-dropdown-item v-else v-on:click="handleLogout"
              >Sign Out</b-dropdown-item
            >
          </b-nav-item-dropdown>
        </b-navbar-nav>
      </b-collapse>
    </b-navbar>
  </div>
</template>

<script>
export default {
  methods: {
    handleLogout() {
      axios
        .post("/logout")
        .then((result) => {
          this.$forceUpdate();
          this.$router.go();
        })
        .catch((err) => {
          console.log(err);
        });
    },
    GoToLogin() {
      this.$router.push("/login");
    },
  },
};
</script>
<style scoped>
img {
  width: 100%;
  object-fit: cover;
  object-position: bottom;
}
</style>