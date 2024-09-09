<script >

import Carousel from '@/components/Carousel.vue';

import slide1 from '../../public/carousel/caroussel1.png';
import slide2 from '../../public/carousel/caroussel2.png';
import slide3 from '../../public/carousel/caroussel3.png';

export default {
  components: { Carousel },
    data() {
        return {
            slides: [
                slide1,
                slide2,
                slide3
              ]
        };
    }


}
</script>

<template>
  <main>
  
    <Carousel :slides="slides"></Carousel>

   <section>
    <div class="title">
      <p>Par les cyclistes, pour les cyclistes</p>
    </div>
    <div class="content">
      <img src="../../public/image/Accueil content.png" alt="">
    </div>
   </section>
      
     
  </main>
</template>

<style scoped>
section{

  padding: 5rem;
  display: flex;
  flex-direction: column;
  justify-content: center;
}
.title{
  width: 90%;
  display: flex;
  justify-content: center;
  padding: 15px;
  background-color: var(--primary);
  border-radius: 15px;
  color: var(--white);
}
.title p{
  font-size: 3rem;
}
.content{
  display: flex;
  justify-content: center;
  margin-top: 5rem;
}

</style>



