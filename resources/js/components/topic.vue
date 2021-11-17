<template>
  <div class="topic">
    <h2>{{ topic.title }}</h2>
    {{ topic.desc }}

    <button @click="removeTopic()" class="trash">
      <font-awesome-icon :icon="['fas', 'trash']" />
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
  background: #864879;
  border: 0px;
}
.topic {
  background: #864879;
  padding: 5px;
  margin: 15px;
  color: #e9a6a6;
  align-content: center;
  border-radius: 8px;
}
</style>
