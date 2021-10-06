<template>
  <div class="topic">
    Title:
    {{ topic.title }}
    <br />
    Description: {{ topic.desc }}
    <button @click="removeTopic()" class="trash">
      <font-awesome-icon icon="trash" />
    </button>
  </div>
</template>

<script>
export default {
  props: ["topic"],
  methods: {
    removeTopic() {
      axios
        .delete("api/topic/" + this.topic.id)
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
.trash {
  color: red;
  border: 5px;
  background: #a19495;
  outline: 0px;
}
</style>
