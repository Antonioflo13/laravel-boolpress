<template>
  <main class="container">
      <Card v-for="(post,index) in posts" :key="index" :posts="posts" />
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