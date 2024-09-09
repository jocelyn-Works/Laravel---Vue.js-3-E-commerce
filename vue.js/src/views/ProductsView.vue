<script>
import ProductVue from '@/components/TheProducts.vue';

export default {
  components: {
    ProductVue
  },
  data() {
    return {


    }
  },
}
</script>
<template>

  <section class="image">
    <h1>Nos Velos</h1>
  </section>

  <ProductVue />

  <section class="footer-product">
    <div class="img1"></div>
    <div class="img2"></div>
  </section>

</template>

<style scoped>
main {
  padding: 90px;
}

.image {
  /* width: 100%; */
  height: 85vh;
  background-image: url('../../public/logo/bike-1505039_1280\ 1.png');
  background-repeat: no-repeat;
  background-size: cover;
 
}

h1 {
  position: absolute;
  top: 72%;
  font-size: 10rem;
  z-index: 1;
  color: var(--secondary);
  font-family: "MuseoModerno", sans-serif;
  font-weight: 500;

}

.footer-product {
  border-top: 5px solid var(--primary);
  margin: 6%;
  padding: 5rem 5rem 0 5rem;
}

.img1 {
  width: 100%;
  height: 75vh;
  align-content: center;
  background-image: url('../../public/image/Réparer-son-be-queen.png');
  background-repeat: no-repeat;
  background-size: contain;

  background-position: center;
  margin-bottom: 30px;
}

.img2 {
  width: 100%;
  height: 75vh;
  border-radius: 15px;
  background-image: url('../../public/image/nos-parcoure.png');
  background-repeat: no-repeat;
  background-size:cover;
  background-position: center;


}
</style>
