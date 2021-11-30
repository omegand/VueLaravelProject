<template>
  <div class="post">
    <h4>{{ this.etitle }}</h4>
    <h6>{{ this.ebody }}</h6>
    <br />
    created by : {{ OPname }}
    <button
      v-if="$user.admin || $user.id == this.post.userid"
      @click="showMsgBoxOne"
      class="trash"
    >
      <font-awesome-icon :icon="['fas', 'trash']" />
    </button>
    <b-button
      v-if="$user.admin || $user.id == this.post.userid"
      @click="EdittingUser"
      class="edit"
    >
      <font-awesome-icon :icon="['fas', 'edit']" />
    </b-button>

    <div v-if="showedit">
      <h3 style="color: greenyellow; text-align: center">Editting a post</h3>
      <form @submit="onSubmit">
        <div class="form-row">
          <input
            v-model="etitle"
            name="title"
            class="form-control"
            placeholder="Title..."
          />
        </div>
        <div class="form-row">
          <input
            v-model="ebody"
            name="body"
            class="form-control"
            placeholder="Body..."
          />
        </div>
        <div class="form-row"></div>
        <div class="form-row">
          <button type="submit" class="btn btn-primary">Save</button>
        </div>
      </form>
    </div>
  </div>
</template>

<script>
export default {
  created() {
    axios
      .get("api/user/" + this.post.userid)
      .then((response) => {
        this.OP = response;
        this.OPname = response.data[0].name;
      })
      .catch((error) => {
        console.log(error);
      });
  },
  data() {
    return {
      etitle: this.post.title,
      ebody: this.post.body,
      OP: [],
      OPname: "",
      modalvalue: "",
      showedit: false,
    };
  },
  props: ["post"],
  methods: {
    EdittingUser() {
      this.showedit = !this.showedit;
    },
    showMsgBoxOne() {
      this.modalvalue = "";
      this.$bvModal
        .msgBoxConfirm("Are you sure?")
        .then((value) => {
          if (value == true) {
            this.removePost();
          }
        })
        .catch((err) => {});
    },
    removePost() {
      axios
        .delete("api/topic/post/" + this.post.id)
        .then(() => {
          this.$emit("changed");
        })
        .catch((error) => {
          console.log(error);
        });
    },
    onSubmit(e) {
      e.preventDefault();
      if (this.etitle == "") {
        alert("Title is empty.");
        return;
      }
      if (this.ebody == "") {
        alert("Body is empty.");
        return;
      }
      axios
        .put("api/topic/post/" + this.post.id, {
          title: this.etitle,
          body: this.ebody,
        })
        .then((response) => {
          this.$emit("changed");
          this.showedit = false;
        })
        .catch((error) => {
          alert("Wrong syntax.");
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
.edit {
  color: gray;
  background: #864879;
  border: 0px;
}
</style>
