<template>
  <div class="books">
    <div class="album py-5 bg-light">
        <div class="container">

 <div class="row justify-content-center">
      <div class="col-md-9">


          <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-4">

           <book-list-item id="6"/>
           <book-list-item id="5"/>
           <book-list-item id="8"/>
           <book-list-item id="3"/>
           <book-list-item id="9"/>
           <book-list-item id="7"/>

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
    BookListItem
  },
  data() {
    return {
      serverMessage: null
    };
  },
  async created() {
    console.log("created");
    const response = await axios.get("/api/start");

console.log(response);

  //  this.serverMessage = "All Books";
  }
};
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped lang="scss">

</style>