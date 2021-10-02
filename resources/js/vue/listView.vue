<template>
  <div>
    <div v-for="(topic, index) in topics" :key="index">
      <list-post :topic="topic" class="topic" v-on:changed="$emit('reload')" />
    </div>
  </div>
</template>

<script>
import listPost from "./listPost.vue";
export default {
  props: ["topics"],
  components: {
    listPost,
  },
};
</script>

<style scoped>
.topic {
  width:30%;
  background: #a19495;
  padding: 5px;
  margin-top: 5px;
  outline: 2px solid black;
}
</style>
