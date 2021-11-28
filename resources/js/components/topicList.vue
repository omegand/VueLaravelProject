<template>
  <div class="row">
    <div class="col-md-3 offset-md-1">
      <div v-for="(topic, index) in topics" :key="index">
        <topic :topic="topic" v-on:changed="$emit('reload')" />
      </div>
    </div>
    <div class="col-md-3 offset-md-1">
      <div v-for="(post, index) in posts" :key="index">
        <post :post="post" v-on:changed="this.$emit('reload')" />
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: ["topics", "posts"],
};
</script>

<style scoped>
</style>
