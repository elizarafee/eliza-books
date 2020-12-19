<template>
  <div :class="`${this.book.sold ? 'd-none' : 'float-end'}`">
    <button
      type="button"
      class="btn btn-outline-success btn-sm"
      data-bs-toggle="modal"
      :data-bs-target="`#bookMarkAsSoldModal-${'' + this.book.id}`"
    >
      <svg
        xmlns="http://www.w3.org/2000/svg"
        width="16"
        height="16"
        fill="currentColor"
        class="bi bi-check2-circle"
        viewBox="0 0 16 16"
      >
        <path
          fill-rule="evenodd"
          d="M15.354 2.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3-3a.5.5 0 1 1 .708-.708L8 9.293l6.646-6.647a.5.5 0 0 1 .708 0z"
        />
        <path
          fill-rule="evenodd"
          d="M8 2.5A5.5 5.5 0 1 0 13.5 8a.5.5 0 0 1 1 0 6.5 6.5 0 1 1-3.25-5.63.5.5 0 1 1-.5.865A5.472 5.472 0 0 0 8 2.5z"
        />
      </svg>
      Mark as sold
    </button>

    <!-- Modal -->
    <div
      class="modal fade"
      :id="`bookMarkAsSoldModal-${'' + this.book.id}`"
      tabindex="-1"
      aria-labelledby="bookMarkAsSoldModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="bookMarkAsSoldModalLabel">
              Modal title
            </h5>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Close"
            ></button>
          </div>
          <div class="modal-body">
            ...
          </div>
          <div class="modal-footer">
            <button
              type="button"
              class="btn btn-secondary"
              data-bs-dismiss="modal"
            >
              Close
            </button>
            <button
              type="button"
              class="btn btn-primary"
              data-bs-dismiss="modal"
              @click="submit"
            >
              Save changes
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import axios from "axios";

export default {
  name: "BookMarkAsSold",
  props: ["book"],
  data: function() {
    return {};
  },

  methods: {
    submit: function() {
      axios
        .post("/api/books/" + this.book.id + "/sold")
        .then((response) => {
          console.warn(response);

          this.$toast.success(response.data.message, {
            duration: 10000,
          });

          this.book.sold = 1;
        })
        .catch((error) => {
          this.$toast.error(error.data.message, {
            duration: 10000,
          });
        });
    },
  },
};
</script>

<style scoped lang="scss">
.btn-space {
  margin-right: 5px;
  margin-bottom: 3px;
}
</style>
