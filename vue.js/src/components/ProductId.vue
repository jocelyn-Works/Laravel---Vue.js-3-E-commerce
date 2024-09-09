<template>
    <section>
        <div v-if="loading">Chargement...</div>
        <div v-if="error">{{ error }}</div>
        <div v-if="!loading && !error">

            <div v-if="product" class="product-card">
                <div class="img">
                    <img src="../../public/product/productId.png" alt="image produit">

                </div>
                <div class="product">
                    <h1>{{ product.name }}</h1>
                    <p>{{ product.description }}</p>
                    <div class="color-price">
                        <div class="color">
                            <div class="bulle red"></div>
                            <div class="bulle  orange"></div>
                            <div class="bulle  yellow"></div>
                            <div class="bulle  green"></div>
                            <div class="bulle  blue"></div>
                            <div class="bulle  purple"></div>
                        </div>
                        <span>{{ formatPrice(product.price) }} €</span>
                    </div>
                    <div class="button">
                        <button class="btn btn-add" @click="addProductToCart(product)">Ajouter au Panier</button>
                        <button class="btn btn-custom ">Personalisation <svg xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 512 512">
                                <path
                                    d="M512 256c0 .9 0 1.8 0 2.7c-.4 36.5-33.6 61.3-70.1 61.3H344c-26.5 0-48 21.5-48 48c0 3.4 .4 6.7 1 9.9c2.1 10.2 6.5 20 10.8 29.9c6.1 13.8 12.1 27.5 12.1 42c0 31.8-21.6 60.7-53.4 62c-3.5 .1-7 .2-10.6 .2C114.6 512 0 397.4 0 256S114.6 0 256 0S512 114.6 512 256zM128 288a32 32 0 1 0 -64 0 32 32 0 1 0 64 0zm0-96a32 32 0 1 0 0-64 32 32 0 1 0 0 64zM288 96a32 32 0 1 0 -64 0 32 32 0 1 0 64 0zm96 96a32 32 0 1 0 0-64 32 32 0 1 0 0 64z" />
                            </svg></button>
                    </div>
                </div>

            </div>

        </div>
        <details>
            <summary>Fiche technique</summary>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Labore cumque unde earum debitis sed mollitia
                ducimus dolores eius reiciendis! Ea natus possimus magni earum quae odit corporis facilis enim
                repellendus!</p>
        </details>

    </section>
</template>

<script>
import axios from "axios";
import { useCartStore } from "../stores/cart.js";


export default {

    data() {
        return {
            product: null,
            loading: false,
            error: null,
        };
    },
    methods: {
        async fetchProductById() {
            this.loading = true;
            this.error = null;
            try {
                const response = await axios.get(`http://127.0.0.1:8000/api/product/${this.$route.params.id}`);
                this.product = response.data.getProductById;
            } catch (error) {
                this.error = error.response ? error.response.data.message : error.message;
            } finally {
                this.loading = false;
            }
        },
        addProductToCart(product) {
            const store = useCartStore(); 
            store.addItems(product); 
        },
        formatPrice(value) {
            let val = (value / 100).toFixed(2).replace('.', ',');
            return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, " ");
        },

    },
    mounted() {
        this.fetchProductById();
    }
};
</script>


<style scoped>
section {
    width: 100%;
    padding: 200px 0;
}

.product-card {
    width: 100%;
    display: flex;
    flex-direction: row;
}

.product {
    width: 50%;
    display: flex;
    flex-direction: column;
    justify-content: center;
    text-align: center;
}

.img {
    width: 50%;
    display: flex;
    justify-content: center;
}

.product h1 {
    font-size: 3rem;
}

.product p {
    font-size: 1.5rem;
    text-align: center;
    padding: 4rem 5rem;
}

.color-price {
    width: 100%;
    display: flex;
    flex-direction: row;
    justify-content: space-evenly;
    font-size: 1.8rem;
}

.color {

    display: flex;
    flex-direction: row;

}

.bulle {
    width: 30px;
    height: 30px;
    border-radius: 50%;
    margin: 0 5px;

}

.red {
    background-color: red;
}

.orange {
    background-color: orange;

}

.yellow {
    background-color: yellow;

}

.green {
    background-color: green;

}

.blue {
    background-color: blue;

}

.purple {
    background-color: red;

}

.button {
    width: 100%;
    display: flex;
    flex-direction: row;
    justify-content: space-evenly;
    margin-top: 5rem;
}

.btn {
    padding: 10px 50px;
    border-radius: 15px;
    text-decoration: none;
    font-size: x-large;
    display: flex;
    flex-direction: row;
    cursor: pointer;

}

.btn-add {
    background-color: var(--primary);
}

.btn-custom {
    background-color: rgb(177, 176, 176);
    border: 1px solid var(--primary);
}

.btn-custom svg {
    width: 30px;
    margin-left: 20px;
}

details {
    width: 40%;
    padding: 5px;
    border: 2px solid var(--black);
    background-color: rgb(177, 176, 176);
    border-radius: 15px;
    margin: 5rem 0rem 0rem 5rem;
    font-size: 1.5rem;
}
</style>