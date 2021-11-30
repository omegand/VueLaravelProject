<template>
  <div @click="$emit('clicked')" class="topic">
    <h2>{{ this.etitle }}</h2>
    {{ this.edesc }}

    <b-button v-if="$user.admin" @click="showMsgBoxOne" class="trash">
      <font-awesome-icon :icon="['fas', 'trash']" />
    </b-button>
    <b-button v-if="$user.admin" @clic="EdittingUser" class="edit">
      <font-awesome-icon :icon="['fas', 'edit']" />
    </b-button>

    <div v-if="showedit">
      <h3 style="color: greenyellow; text-align: center">Editting a topic</h3>
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
            v-model="edesc"
            name="desc"
            class="form-control"
            placeholder="Description..."
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
  props: ["topic"],
  data() {
    return {
      etitle: this.topic.title,
      edesc: this.topic.desc,
      showedit: false,
      modalvalue: "",
    };
  },
  methods: {
    showMsgBoxOne() {
      this.modalvalue = "";
      this.$bvModal
        .msgBoxConfirm("Are you sure?")
        .then((value) => {
          if (value == true) {
            this.removeTopic();
          }
        })
        .catch((err) => {});
    },
    removeTopic() {
      axios
        .delete("api/topic/" + this.topic.id)
        .then((response) => {
          this.$emit("changed");
        })
        .catch((error) => {
          console.log(error);
        });
    },
    EdittingUser() {
      this.showedit = !this.showedit;
    },
    onSubmit(e) {
      e.preventDefault();
      if (this.etitle == "") {
        alert("Title is empty.");
        return;
      }
      if (this.edesc == "") {
        alert("Description is empty.");
        return;
      }
      axios
        .put("api/topic/" + this.topic.id, {
          title: this.etitle,
          desc: this.edesc,
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
.topic {
  background: #864879;
  padding: 10px;
  margin: 20px;
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
