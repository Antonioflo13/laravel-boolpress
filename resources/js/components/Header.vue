<template>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">Boolpress</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <router-link class="nav-link" :to="{ name:'home' }">Home</router-link>
                        </li>
                        <li>
                            <router-link class="nav-link" :to="{ name:'blog' }">Blog</router-link>
                        </li>
                        <li>
                            <router-link class="nav-link" :to="{ name:'' }">Chi siamo</router-link>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
</template>

<script>
export default {
    name: 'header',
}
</script>

<style lang="scss">
    #navbarNav {
        ul li {
            a .router-link-active {
                color: blue;
            }
        }
    }

</style>