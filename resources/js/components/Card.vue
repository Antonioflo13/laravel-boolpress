<template>
    <div class="card m-3" style="width: 18rem;">
        <img src="" class="card-img-top" alt="">
        <div class="card-body">
            <h5 class="card-title">{{ posts.title }}</h5>
            <p class="card-text">{{ posts.substring }}</p>
            <a href="#" class="btn btn-primary">Entra</a>
        </div>
    </div>
</template>

<script>
export default {
    name: 'Card',
    props: ['posts']
}
</script>

<style>

</style>