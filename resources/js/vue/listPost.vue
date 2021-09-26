<template>
  <div class="post">
    Title:
    {{ post.title }}
    <br />
    Body: {{ post.body }}
    <button @click="removePost()" class="trash">
      <font-awesome-icon icon="trash" />
    </button>
  </div>
</template>

<script>
export default {
  props: ["post"],
  methods: {
    removePost() {
      axios
        .delete("api/post/" + this.post.id)
        .then((response) => {
          if (response.status == 200) {
            this.$emit("changed");
          }
        })
        .catch((error) => {
          console.log(error);
        });
    },
  },
};
</script>
<style scoped>
.post {
  display: flex;
  justify-content: left;
  align-items: center;
}
.trash {
  background: gray;
  border: none;
  color: red;
  outline: none;
}
</style>
