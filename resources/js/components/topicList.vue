<template>
  <div class="col-md-4 offset-md-4">
    <div v-for="(topic, index) in topics" :key="index">
      <topic :topic="topic" v-on:changed="$emit('reload')" />
    </div>
  </div>
</template>

<script>
export default {
  props: ["topics"]
};
</script>

<style scoped>
</style>
