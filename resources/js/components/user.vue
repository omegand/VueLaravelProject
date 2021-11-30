<template>
  <div>
    <div class="user">
      <div class="mb-2">
        {{ edituser.name }}
        <br />
        {{ edituser.email }}
        <b-button v-if="$user.admin" @click="showMsgBoxOne" class="trash">
          <font-awesome-icon :icon="['fas', 'trash']" />
        </b-button>
        <b-button v-if="$user.admin" @click="EdittingUser" class="edit">
          <font-awesome-icon :icon="['fas', 'edit']" />
        </b-button>
      </div>
    </div>

    <div v-if="showedit">
      <h3 style="color: greenyellow; text-align: center">Editting an user</h3>
      <form @submit="onSubmit">
        <div class="form-row">
          <input
            v-model="edituser.name"
            name="name"
            class="form-control"
            placeholder="name..."
          />
        </div>
        <div class="form-row">
          <input
            v-model="edituser.email"
            name="email"
            class="form-control"
            placeholder="email..."
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
  props: ["user"],
  data() {
    return {
      edituser: {
        name: this.user.name,
        email: this.user.email,
      },
      modalvalue: "",
      showedit: false,
    };
  },
  methods: {
    removeuser() {
      axios
        .delete("api/user/" + this.user.id)
        .then(() => {
          this.$emit("changed");
        })
        .catch((error) => {
          console.log(error);
        });
    },
    showMsgBoxOne() {
      this.modalvalue = "";
      this.$bvModal
        .msgBoxConfirm("Are you sure?")
        .then((value) => {
          if (value == true) {
            this.removeuser();
          }
        })
        .catch((err) => {});
    },

    onSubmit(e) {
      e.preventDefault();
      if (this.edituser.name == "") {
        alert("Name is empty.");
        return;
      }
      if (this.edituser.email == "") {
        alert("Body is empty.");
        return;
      }
      axios
        .put("api/user/" + this.user.id, {
          name: this.edituser.name,
          email: this.edituser.email,
        })
        .then((response) => {
          this.edituser.name = "";
          this.edituser.email = "";
          this.$emit("changed");
        })
        .catch((error) => {
          alert("Wrong syntax.");
        });
    },
    EdittingUser() {
      this.showedit = !this.showedit;
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
.edit {
  color: gray;
  background: #864879;
  border: 0px;
}
.user {
  background: #864879;
  padding: 5px;
  margin: 15px;
  color: #e9a6a6;
  align-content: center;
  border-radius: 8px;
}
</style>
