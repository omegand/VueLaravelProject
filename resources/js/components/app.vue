<template>
  <div class="everything">
    <nbar />
    <headvue />

    <router-view :user="user"></router-view>
    <footvue />
  </div>
</template>
<script>
export default {
  props: ["user"],
};
</script>
<style>
.everything {
  background: #1f1d36;
  position: fixed;
  width: 100%;
  height: 100%;
}
</style>