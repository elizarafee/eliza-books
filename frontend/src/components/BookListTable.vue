<template>
    <div class="py-5">
      <div class="container">
        <div class="pb-5">
          <h3 class="float-start text-left">List of Books</h3>
          <router-link
            to="/books/create"
            class="btn btn-outline-secondary btn-sm float-end"
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
              <th scope="col" width="40%" class="text-start">Title</th>
              <th scope="col" width="20%" class="d-none d-sm-table-cell">
                Purchased At
              </th>
              <th scope="col" width="">Handle</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <th scope="row">1</th>
              <td class="text-start">Mark <span class="badge bg-warning text-dark">Sold</span></td>
              <td class="d-none d-sm-table-cell">Otto</td>
              <td>

<book-mark-as-sold />
<remove-book />

              </td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
</template>

<script>
//import axios from "axios";

import BookMarkAsSold from "@/components/BookMarkAsSold";
import RemoveBook from "@/components/RemoveBook";

export default {
  name: "BookListTable",
  components: {
    BookMarkAsSold,
    RemoveBook,
  },
  data() {
    return {
      serverMessage: null,
      isModalVisible: false,
    };
  },
  async created() {
    console.log("created");
    // const response = await axios.get("/api/start");
    //  this.serverMessage = "All Books";
  },
   methods: {
      showModal() {
        this.isModalVisible = true;
      },
      closeModal() {
        this.isModalVisible = false;
      }
    }
};
</script>

