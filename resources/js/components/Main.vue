<template>
  <main class="container d-flex justify-content-center">
      <Card v-for="(post,index) in posts" :key="index" :posts="post" />
  </main>
</template>

<script>
import Card from './Card.vue';

export default {
    name: 'Main',
    props: ['posts'],
    components: {
      Card,
    }
}
</script>

<style>

</style>