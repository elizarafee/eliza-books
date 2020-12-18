<template>
  <div>
    <button
      type="button"
      class="ml-3 btn btn-outline-danger btn-sm btn-space float-start"
      data-bs-toggle="modal"
      :data-bs-target="`#removeBookModal-${'' + this.book.id}`"
    >
      <svg
        xmlns="http://www.w3.org/2000/svg"
        width="16"
        height="16"
        fill="currentColor"
        class="bi bi-trash"
        viewBox="0 0 16 16"
      >
        <path
          d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"
        />
        <path
          fill-rule="evenodd"
          d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"
        />
      </svg>
      Remove
    </button>

    <!-- Modal -->
    <div
      class="modal fade"
      :id="`removeBookModal-${'' + this.book.id}`"
      tabindex="-1"
      aria-labelledby="removeBookModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="removeBookModalLabel">Modal title</h5>
            <button
              type="button"
              class="btn-close"
              data-bs-dismiss="modal"
              aria-label="Close"
            ></button>
          </div>
          <div class="modal-body">
           {{ this.book.id }}
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
  name: "RemoveBook",
  props: ["book"],
  data: function() {
    return {};
  },

  methods: {
    submit: function() {
      axios
        .delete("/api/books/" + this.book.id)
        .then((response) => {
       // console.warn(response);

        if(response.data.status === "success") {
this.$toast.success(response.data.message, {
            duration: 10000,
          });

         this.$router.push('/dashboard');
        }

        if(response.data.status === "error") {
this.$toast.error(response.data.message, {
            duration: 10000,
          });

          this.book.sold = 1;
        }

          
        })
        .catch((error) => {

console.log(error);

          // this.$toast.error(error.data.message, {
          //   duration: 10000,
          // });
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
