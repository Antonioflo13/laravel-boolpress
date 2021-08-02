<template>
    <div class="card m-3" style="width: 18rem;">
        <img src="" class="card-img-top" alt="">
        <div class="card-body">
            <h4 class="card-title">{{ posts.title }}</h4>
            <p class="card-text">{{ posts.substring }}</p>
            <router-link :to="{ name:'details-page' , params: { slug: posts.slug } }" class="btn btn-primary">Entra</router-link>
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