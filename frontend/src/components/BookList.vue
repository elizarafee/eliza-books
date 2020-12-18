<template>
  <div class="books">
    <div class="album py-5 bg-light">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-10">
            <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4">
              <div class="col" v-for="book in books" :key="book.id">
                <book-list-item :book="book" />
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";
import BookListItem from "@/components/BookListItem.vue";

export default {
  name: "Books",
  components: {
    BookListItem,
  },
  data() {
    return {
      books: {},
    };
  },
  async created() {
    const response = await axios.get("/api/books");
    if (response.data.status == "success") {
      this.books = response.data.data;
    } else if (response.data.status == "error") {
      this.$toast.error(response.data.message, {
        duration: 10000,
      });
    }
  },
};
</script>
