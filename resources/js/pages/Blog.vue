<template>
    <section>
        <section class="container d-flex justify-content-center">
            <Card v-for="(post,index) in posts" :key="index" :posts="post"/>
        </section>
        <Paginator 
            :lastPage="lastPage" :currentPage="currentPage" 
            @setCurrentPage="getPosts" @backPage="getPosts" @nextPage="getPosts"/>
    </section>
</template>

<script>
import Card from '../components/Card';
import Paginator from '../components/Paginator';

export default {
    name: 'Blog',
    components: {
      Card,
      Paginator,
    },
    data() {
        return {
            posts: [],
            currentPage: 1,
            lastPage: 1,
        }
    },
    methods: {
        substringText: function(string, paragraphLength) {
            if(string.length > paragraphLength) {
                return string.substr(0, paragraphLength) + '...';
            } else {
                return string;
            }
        },
        getPosts: function(page = 1) {
            axios 
                .get(`http://127.0.0.1:8000/api/posts?page=${page}`)
                .then(
                    res => {
                        this.posts = res.data.data;
                        this.currentPage = res.data.current_page;
                        this.lastPage = res.data.last_page;
                        this.posts.forEach(
                            element => {
                            element.substring = this.substringText(element.content, 150);
                        });
                    }
                )
                .catch(
                    err => {
                    console.log(err);
                });
        },
    },
    created: function() {
        this.getPosts();
    }
}
</script>

<style>

</style>