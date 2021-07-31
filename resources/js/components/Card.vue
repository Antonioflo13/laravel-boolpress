<template>
    <div class="card m-3" style="width: 18rem;">
        <img src="" class="card-img-top" alt="">
        <div class="card-body">
            <h4 class="card-title">{{ posts.title }}</h4>
            <h5>{{ cats.name }}</h5>
            <p class="card-text">{{ posts.substring }}</p>
            <a href="#" class="btn btn-primary">Entra</a>
        </div>
    </div>
</template>

<script>
export default {
    name: 'Card',
    props: ['posts','cats']
}
</script>

<style>

</style>