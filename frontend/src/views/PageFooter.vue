<template>
  <footer class="text-muted py-5 border border-top border-bottom-0">
    <div class="container">
      <p class="mb-1">Eliza Books &copy; 2020</p>
      <p class="mb-0">
        In case of any issue, please
        <router-link to="/contact">contact</router-link> me. &#10084;
      </p>
    </div>
  </footer>
</template>

<script>
export default {
  name: "page-footer",
};
</script>

<style scoped lang="scss">
footer {
  a {
    text-decoration: underline;
    color: #2c3e50;

    &:hover {
      text-decoration: none;
      color: #42b983;
    }
  }
}
</style>
