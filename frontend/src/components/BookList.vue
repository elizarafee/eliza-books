<template>
  <div class="books">
    <div class="album py-5 bg-light">
        <div class="container">
          <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">

           <book-list-item />
           <book-list-item />
           <book-list-item />
           <book-list-item />
           <book-list-item />
           <book-list-item />

          </div>
        </div>
      </div>
    
  </div>
</template>

<script>
//import axios from "axios";
import BookListItem from "@/components/BookListItem.vue";

export default {
  name: "Books",
  components: {
    BookListItem
  },
  data() {
    return {
      serverMessage: null
    };
  },
  async created() {
    console.log("created");
   // const response = await axios.get("/api/start");
  //  this.serverMessage = "All Books";
  }
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped lang="scss">

</style>