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
        }
    },
    created: function() {
        axios 
            .get('http://127.0.0.1:8000/api/posts')
            .then(
                res => {
                    this.posts = res.data.data;
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