<template>
  <div class="container">
    <div class="row justify-content-center pt-5 pb-5">
      <div class="col-md-8">
        <div class="row">
          <div class="col-sm-6">
            <h3 class="text-start">
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="16"
                height="16"
                fill="currentColor"
                class="bi bi-book-half"
                viewBox="0 0 16 16"
              >
                <path
                  fill-rule="evenodd"
                  d="M8.5 2.687v9.746c.935-.53 2.12-.603 3.213-.493 1.18.12 2.37.461 3.287.811V2.828c-.885-.37-2.154-.769-3.388-.893-1.33-.134-2.458.063-3.112.752zM8 1.783C7.015.936 5.587.81 4.287.94c-1.514.153-3.042.672-3.994 1.105A.5.5 0 0 0 0 2.5v11a.5.5 0 0 0 .707.455c.882-.4 2.303-.881 3.68-1.02 1.409-.142 2.59.087 3.223.877a.5.5 0 0 0 .78 0c.633-.79 1.814-1.019 3.222-.877 1.378.139 2.8.62 3.681 1.02A.5.5 0 0 0 16 13.5v-11a.5.5 0 0 0-.293-.455c-.952-.433-2.48-.952-3.994-1.105C10.413.809 8.985.936 8 1.783z"
                />
              </svg>
              Book Details
            </h3>
          </div>
          <div class="col-sm-6">
            <remove-book class="float-end" :book="book" />
          </div>
        </div>

        <hr />

        <div class="row">
          <div class="col-sm-12 col-md-4">
            <img
              :src="
                `http://localhost:8088/images/${
                  book.picture ? book.picture : 'book.jpg'
                }`
              "
              class="rounded float-start img-fluid mb-3"
              :alt="`${book.title}`"
            />
          </div>
          <div class="col-sm-12 col-md-8 text-start">
            <div class="list-group">
              <div class="list-group-item">
                <strong>Title:</strong> {{ book.title }}
                <span
                  :class="
                    `${book.sold ? 'badge bg-success' : 'd-none'}`
                  "
                  >Sold</span
                >
              </div>
              <div class="list-group-item">
                <strong>Author(s): </strong> {{ book.authors }}
              </div>
              <div class="list-group-item">
                <strong>Format: </strong> {{ book.format }}
              </div>
              <div class="list-group-item">
                <strong>Original Price: </strong>
                {{
                  book.original_price > 0
                    ? "&#163;" + book.original_price
                    : "Not known"
                }}
              </div>
              <div class="list-group-item">
                <strong>Selling Price: </strong> &#163;{{ book.selling_price }}
              </div>
              <div class="list-group-item">
                <strong>Condition:</strong> {{ book.condition }}
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
import RemoveBook from "@/components/RemoveBook";

export default {
  name: "BookDetails",
  components: {
    RemoveBook,
  },
  props: ["book_id"],
  data() {
    return {
      book: {},
    };
  },
  async created() {
    const response = await axios.get("/api/books/" + this.book_id);

    if (response.data.status == "success") {
      if (response.data.data) {
        this.book = response.data.data;
      } else {
        this.$router.push("/books");
      }
    } else if (response.data.status == "error") {
      this.$toast.error(response.data.message, {
        duration: 10000,
      });
    }
  },
};
</script>
