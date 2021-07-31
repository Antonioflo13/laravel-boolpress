<template>
    <div class="container d-flex justify-content-center">
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                
                <li v-if="currentPage > 1" class="page-item" @click="backPage()"><button class="page-link" href="#">Previous</button></li>
                <li  class="page-item" v-for="n in lastPage" :key="n" @click="setCurrentPage(n)"><button class="page-link" href="#">{{ n }}</button></li>
                <li v-if="currentPage < lastPage" class="page-item" @click="nextPage()"><a class="page-link" href="#">Next</a></li>
            </ul>
        </nav>
    </div>
</template>

<script>
export default {
    name: 'Paginator',
    props: ['lastPage','currentPage'],
    data() {
        return {
           Page: '',
        }
    },
    methods : {
        setCurrentPage: function(n) {
            this.$emit('setCurrentPage', n);
        },
        backPage() {
            this.page = this.currentPage;
            this.page --;
            this.$emit('backPage', this.page);
        },
        nextPage() {
            this.page = this.currentPage;
            this.page ++;
            this.$emit('nextPage', this.page);
        }
    }
}
</script>

<style>

</style>