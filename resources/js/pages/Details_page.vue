<template>
    <section class="container">
        <h1>{{ post.title }}</h1>
        <h3 v-if="post.category" class="badge badge-secondary">{{ post.category.name }}</h3>
        <div v-for="tag in post.tags" :key="tag.id">
            <span class="badge badge-success">{{ tag.name }}</span>
        </div>
        <p>{{ post.content }}</p>
        <img class="img-fluid" :src="post.url_image" :alt="post.title">
        <router-link class="btn btn-primary" :to="{ name:'blog' }">Torna all' elenco Post</router-link>
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