<template>
  <div class="card shadow-sm h-100">
    <img
      :src="
        `http://localhost:8088/images/${
          book.picture ? book.picture : 'book.png'
        }`
      "
      class="card-img-top fit-height"
      :alt="`${book.title}`"
    />
    <div class="card-body">
      <h5 class="card-title">
        {{ book.title }}
      </h5>
      <p class="card-text text-muted">{{ book.authors }} <br/>
        <span :class="`${book.sold ? 'badge bg-warning text-dark' : 'd-none'}`"
          >Sold</span
        >
      </p>
      <div class="d-flex justify-content-between align-items-center"></div>
    </div>

    <div class="card-footer">
      <div class="btn-group float-start">
        <router-link
          :to="`/books/${book.id}`"
          class="btn btn-sm btn-outline-success"
          >Book Details</router-link
        >
      </div>
      <span class="float-end"
        ><small class="text-muted mr-1"
          ><del>&#163;{{ book.original_price }}</del></small
        >
        <strong>&#163;{{ book.selling_price }}</strong>
      </span>
    </div>
  </div>
</template>

<script>
export default {
  props: ["book"],
};
</script>

<style scoped lang="scss">
.fit-height {
  height: 260px;
  object-fit: cover;
}
</style>
