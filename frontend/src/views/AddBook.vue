<template>
  <div class="books">
    <add-book-form />
  </div>
</template>

<script>
// @ is an alias to /src
import AddBookForm from "@/components/AddBookForm.vue";

export default {
  name: "add-book",
  components: {
    AddBookForm
  }
};
</script>