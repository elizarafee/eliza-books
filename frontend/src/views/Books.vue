<template>
  <div class="books">
    <book-list />
  </div>
</template>

<script>
// @ is an alias to /src
import BookList from "@/components/BookList.vue";

export default {
  name: "books",
  components: {
    BookList
  }
};
</script>