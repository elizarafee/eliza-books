<template>
  <div class="py-5">
    <div class="container">
      <div class="pb-5">
        <h3 class="float-start text-left">List of Books</h3>
        <router-link
          to="/books/create"
          class="float-end btn btn-outline-success btn-sm"
          ><svg
            xmlns="http://www.w3.org/2000/svg"
            width="16"
            height="16"
            fill="currentColor"
            class="bi bi-plus-circle"
            viewBox="0 0 16 16"
          >
            <path
              fill-rule="evenodd"
              d="M8 15A7 7 0 1 0 8 1a7 7 0 0 0 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"
            />
            <path
              fill-rule="evenodd"
              d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"
            />
          </svg>
          Add new book</router-link
        >
      </div>

      <table class="table table-bordered">
        <thead>
          <tr>
            <th scope="col" width="5%">#</th>
            <th scope="col" width="75%" class="text-start">Title</th>
            <th scope="col" width="20%" class="d-none d-sm-table-cell text-end">
              Selling Price
            </th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="book in books" :key="book.id" v-show="`${ book.removed === 1 ? 0 : 1}`">
            <th scope="row">{{ book.id }}</th>
            <td class="text-start">
              <router-link class="float-start info-link book-link px-1" :to="`/books/${book.id}`">
                {{ book.title }}
              </router-link>
              <span
                :class="
                  `${book.sold ? 'badge bg-success' : 'd-none'}`
                "
                >Sold</span
              >

              <book-mark-as-sold :book="book" />
            </td>
            <td class="d-none d-sm-table-cell text-end">
              &#163;{{ book.selling_price }}
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</template>

<script>
import axios from "axios";
import BookMarkAsSold from "@/components/BookMarkAsSold";


export default {
  name: "BookListTable",
  components: {
    BookMarkAsSold,
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


<style scoped lang="scss">
.book-link {
  &:hover {
    color: #198754;
    text-decoration: none;
  }
}
</style>