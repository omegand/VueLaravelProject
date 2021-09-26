<template>
  <div>
    <div v-for="(post, index) in posts" :key="index">
      <list-post :post="post" class="post" v-on:changed="$emit('reload')" />
    </div>
  </div>
</template>

<script>
import listPost from "./listPost.vue";
export default {
  props: ["posts"],
  components: {
    listPost,
  },
};
</script>

<style scoped>
.post {
  background: gray;
  padding: 5px;
  margin-top: 5px;
}
</style>
