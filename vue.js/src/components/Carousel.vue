<template>
    <div class="carousel">
        <div class="carousel-inner">
            <carousel-item v-for="(slide, index) in slides" :slide="slide" :key="`item-${index}`"
                :current-slide="currentSlide" :index="index">
            </carousel-item>
        </div>
    </div>
</template>

<script>
import CarouselItem from './CarouselItem.vue';

export default {
    props: {
        slides: {
            type: Array,
            required: true
        }
    },
    components: {
        CarouselItem
    },
    data() {
        return {
            currentSlide: 0,
            slideInterval: null
        };
    },
    methods: {
        setCurrentSlide(index) {
            this.currentSlide = index;
        }
    },
    mounted() {
        this.slideInterval = setInterval(() => {
            const nextIndex = this.currentSlide < this.slides.length - 1 ? this.currentSlide + 1 : 0;
            this.setCurrentSlide(nextIndex);
        }, 3000);
    },
    beforeUnmount() {
        clearInterval(this.slideInterval); 
    }
};
</script>

<style scoped>
.carousel {
    display: flex;
    justify-content: center;
    width: 100%;

}

.carousel-inner {
    position: relative;
    width: 100%;
    overflow: hidden;
}
</style>