<template>
    <div>
        <Header :links="link"/>
    </div>
</template>

<script>
import Header from './components/Header'
export default {
    name: 'App',
    components: {
        Header,
    },
    data() {
        return {
            link: [
                "Documentari",
                "Tv",
                "E-Book"
            ]
        }
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