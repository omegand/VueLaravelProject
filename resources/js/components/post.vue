<template>
  <div class="post">
    <h4>{{ post.title }}</h4>
    {{ post.body }}
    <button v-if="$user.admin" @click="removePost()" class="trash">
      <font-awesome-icon :icon="['fas', 'trash']" />
    </button>
  </div>
</template>

<script>
export default {
  props: ["post"],
  methods: {
    removePost() {
      axios
        .delete("api/topic/post/" + this.post.id)
        .then((response) => {
          this.$emit("changed");
        })
        .catch((error) => {
          console.log(error);
        });
    },
  },
};
</script>
<style scoped>
.trash {
  color: red;
  background: #864879;
  border: 0px;
}
.post {
  background: #864879;
  padding: 5px;
  margin: 15px;
  color: #e9a6a6;
  align-content: center;
  border-radius: 8px;
}
</style>
