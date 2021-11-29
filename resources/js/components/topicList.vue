<template>
  <div class="row" style="background: #1f1d36">
    <div class="col-md-3 offset-md-1">
      <topic
        v-for="(topic, index) in topics"
        :key="index"
        :topic="topic"
        v-on:changed="$emit('reload')"
      />
    </div>
    <div class="col-md-5 offset-md-1">
      <post
        v-for="(post, index) in posts"
        :key="index"
        :post="post"
        v-on:changed="$emit('reload')"
      />
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
