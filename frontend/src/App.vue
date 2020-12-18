<template>
  <div id="app">
    <PageHeader />
    <main class="bg-light">
      <router-view />
    </main>
    <PageFooter />
  </div>
</template>

<script>
// @ is an alias to /src
import PageHeader from "@/views/PageHeader.vue";
import PageFooter from "@/views/PageFooter.vue";

export default {
  name: "app",
  components: {
    PageHeader,
    PageFooter,
  },
};
</script>

<style lang="scss">
#app {
  font-family: "Avenir", Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  margin: 0;
  padding: 0;
}

main {
  min-height: 400px;
}
</style>
