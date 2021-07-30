<template>
    <div>
        <Header :links="link"/>
        <Main :posts="posts"/>
        <Footer/>
    </div>
</template>

<script>
import Header from './components/Header';
import Main from './components/Main';
import Footer from './components/Footer';

export default {
    name: 'App',
    components: {
        Header,
        Main,
        Footer
    },
    data() {
        return {
            link: [
                "Documentari",
                "Tv",
                "E-Book"
            ],
            posts: [],
            currentPage: 1,
            lastPage: 1
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
    },
    created: function() {
        axios 
            .get(`http://127.0.0.1:8000/api/posts?page=${this.currentPage}`)
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
            .catch();
    }
} 
</script>

<style lang="scss">
    div {
        h1 {
            color:red;
        }
    }
</style>