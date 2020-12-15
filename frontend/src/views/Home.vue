<template>
  <div class="home">
    <img alt="Vue logo" src="../assets/logo.webp" />
    <up-start />
  </div>
</template>

<script>
// @ is an alias to /src
import UpStart from "@/components/UpStart.vue";

export default {
  name: "home",
  components: {
    UpStart
  }
};
</script>
