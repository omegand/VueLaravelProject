<template>
  <div class="add">
    <input type="text" v-model="post.title" />
    <font-awesome-icon
      icon="plus-square"
      @click="addPost()"
      :class="[post.title ? 'active' : 'inactive', 'plus']"
    />
  </div>
</template>

<script>
export default {
  data: function () {
    return {
      post: {
        title: "",
        body: "",
      },
    };
  },
  methods: {
    addPost() {
      if (this.post.title == "") {
        return;
      }
      axios
        .post("api/post/store", {
          post: this.post,
        })
        .then((response) => {
          if (response.status == 201) {
            this.post.title = "";
            this.$emit('reload');
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
.add {
  display: flex;
  justify-content: center;
  align-items: center;
}
input {
  background: gray;
  border: 5px;
  outline: none;
  padding: 5px;
  margin-right: 10px;
  width: 100%;
}
.plus {
  font-size: 30px;
}
.active {
  color: blue;
}
.inactive {
  color: gray;
}
</style>