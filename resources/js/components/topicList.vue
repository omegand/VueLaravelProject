<template>
  <div class="topic">
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
.topic {
  background: #1F1D36;
  padding: 5px;
  margin-top: 5px;
}
</style>
