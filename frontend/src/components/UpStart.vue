<template>
  <div class="up-start">
    <h1 class="title">
      Please read the Readme.md file in project root for requirements.
    </h1>
    <p class="message" v-if="serverMessage">{{ serverMessage }}</p>
  </div>
</template>

<script>
import axios from "axios";

export default {
  name: "UpStart",
  data() {
    return {
      serverMessage: null
    };
  },
  async created() {
    console.log("created");
    const response = await axios.get("/api/start");
    this.serverMessage = response.data.message;
  }
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped lang="scss">
.up-start {
  .title {
    color: red;
  }

  .message {
    font-size: 2rem;
  }
}
</style>
