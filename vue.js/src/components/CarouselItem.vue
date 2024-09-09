<template>
  <div class="carousel-item" v-show="currentSlide === index">
    <img :src="slide" alt="carousel image">
  </div>
</template>

<script>
export default {
  props: ["slide", "currentSlide", "index"],
};
</script>

<style scoped>
.carousel-item {
  width: 100%;
  object-fit: contain;
}
.carousel-item img{
  width: 100%;
  height: 60vh;
}
</style>
