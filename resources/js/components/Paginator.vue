<template>
    <div class="container d-flex justify-content-center">
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                
                <li v-if="currentPage > 1" class="page-item" @click="backPage()"><button class="btn btn-primary m-2" href="#">Previous</button></li>
                <li  class="page-item" v-for="n in lastPage" :key="n" 
                    @click="setCurrentPage(n)">
                    <button class="btn m-2" href="#" :class="(n == currentPage) ? 'btn-primary' : 'btn-info'">{{ n }}</button>
                </li>
                <li v-if="currentPage < lastPage" class="page-item" @click="nextPage()"><button class="btn btn-primary m-2" href="#">Next</button></li>
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