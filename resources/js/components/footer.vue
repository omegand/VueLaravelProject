<template>
  <div class="footer">
    Copyright &copy; 2021
    <br />
    <router-link style="text-decoration: none; color: inherit" to="/about">
      <h5>About</h5>
    </router-link>
  </div>
</template>

<script>
export default {};
</script>

<style scoped>
.footer {
  padding-top: 20px;
  text-align: center;
  color: lightgreen;
  background: #3f3351;
  box-shadow: 0 50vh 0 50vh #3f3351;
}
</style>