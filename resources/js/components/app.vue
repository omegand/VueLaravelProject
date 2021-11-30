<template>
  <div class="main">
    <nbar />
    <transition name="fade">
      <router-view></router-view>
    </transition>
    <footvue />
  </div>
</template>
<script>
export default {};
</script>
<style>
.main {
  background: #3f3351;
}
.image {
  max-width: 150%;
  background: black;
}
.everything {
  background: #1f1d36;
  position: fixed;
  width: 100%;
  height: 100%;
  position: fixed;
}
.fade-enter-active,
.fade-leave-active {
  transition: all 1s ease-in-out;
}
.fade-enter,
.fade-leave-to {
  opacity: 0;
  transform: translateY(-200px);
}
</style>
