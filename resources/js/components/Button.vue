<template>
  <button @click="onClick()">
    {{ text }}
  </button>
</template>

<script>
export default {
  name: "Button",
  props: {
    text: String,
    toggle: Boolean,
  },
  methods: {
    onClick() {
      this.$emit("toggle");
    },
  },
};
</script>