<template>
    <section class="container">
        <h1>{{ post.title }}</h1>
        <p>{{ post.content }}</p>
    </section>
</template>

<script>

export default {
    name: 'Details_page',
    data() {
        return {
            post : '',
        }
    },
    methods: {
        getPost(slug) {
            axios 
                .get(`http://127.0.0.1:8000/api/posts/${slug}`) 
                .then(
                    res => {
                        this.post = res.data;
                    }
                )
        }
    },
    created: function () {
        this.getPost(this.$route.params.slug);
    }
}
</script>

<style>

</style>