<template>
  <div class="main">
    <nbar />
    <router-view></router-view>
    <footvue />
  </div>
</template>
<script>
export default {};
</script>
<style>
.main {
  width: 100%;
  height: 100%;
  background: #3f3351;
}
.image {
  max-width: 150%;
  background: black;
}
</style>
