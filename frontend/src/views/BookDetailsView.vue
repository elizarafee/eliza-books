<template>
  <div class="books">
   <book-details  :book_id="`${ this.$route.params.book_id }`" />
  </div>
</template>

<script>
// @ is an alias to /src
import BookDetails from "@/components/BookDetails.vue";

export default {
  name: "BookDetailsView",

  components: {
    BookDetails
  }
};
</script>