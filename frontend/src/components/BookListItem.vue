<template>
    <div class="col">
        <div class="card shadow-sm h-100">
            <img src="../assets/logo.png" class="card-img-top bg-light" alt="...">
       <div class="card-body text-start">
            <p class="card-text ">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
            <div class="d-flex justify-content-between align-items-center">
            <div class="btn-group">
                <router-link :to="`/books/${ id }`" class="btn btn-sm btn-outline-secondary">Book Details</router-link>
            </div>
            <small class="text-muted">9 mins</small>
            </div>
        </div>
        </div>
    </div>
</template>

<script>
export default {
 props: ['id']
}
</script>

