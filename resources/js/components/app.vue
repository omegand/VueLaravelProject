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
.fade-enter-active,
.fade-leave-active {
  transition: all 0.5s ease-in-out;
}
.fade-enter,
.fade-leave-to {
  opacity: 0;
  transform: translateY(-200px);
}
</style>
