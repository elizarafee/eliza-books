<template>
  <div>
   <book-details  :book_id="`${ this.$route.params.book_id }`" />
  </div>
</template>

<script>

import BookDetails from "@/components/BookDetails.vue";

export default {
  name: "BookDetailsView",
  components: {
    BookDetails
  }
};
</script>