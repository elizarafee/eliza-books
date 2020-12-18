<template>
  <div class="books">
    <book-list-table />
  </div>
</template>

<script>
// @ is an alias to /src
import BookListTable from "@/components/BookListTable.vue";

export default {
  name: "books",
  components: {
    BookListTable,
  },
};
</script>
