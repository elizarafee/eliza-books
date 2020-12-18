<template>
 
<div>



<button
                  type="button"
                  class="btn btn-outline-warning btn-sm btn-space float-start"
                  data-bs-toggle="modal" data-bs-target="#bookMarkAsSoldModal"
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
<div class="modal fade" id="bookMarkAsSoldModal" tabindex="-1" aria-labelledby="bookMarkAsSoldModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">




      <div class="modal-header">
        <h5 class="modal-title" id="bookMarkAsSoldModalLabel">Modal title</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" data-bs-dismiss="modal" @click="submit">Save changes</button>
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
  data: function() {
    return {
      
    };
  },


  methods: {

      close() {
        this.$emit('close');
      },
    

    submit: function() {
      

      this.$toast.success("Book marked as sold successfully.", {
	showProgress: false,
	rtl: true,
	timeOut: 5000, // infinity
	closeable: false
});







      //alert("Data Submit");

      const formData = new FormData();
      formData.append("title", this.title);

      axios
        .post("/api/books/45/sold", formData)
        .then((response) => {
          console.warn(response);
         
        })
        .catch((error) => {




          if (error.response.status == 422) {
            this.validationErrors = error.response.data;
            console.log(this.validationErrors);
          }
        });
    },
  },
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped lang="scss">

.btn-space {
  margin-right: 5px;
  margin-bottom: 3px;
}

</style>
