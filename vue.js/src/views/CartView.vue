<template>
    <section>
        <div class="title">
            <h2>Votre Panier</h2>
        </div>
        <div v-if="cartItems.length === 0">Votre panier est vide</div>
        <div v-else>
            <div v-for="(item, index) in sortedItems" :key="index" class="cart-item">
                
                <div class="item">
                    <div class="img">
                        <router-link :to="{ name: 'ProductId', params: { id: item.id } }" >
                        <img src="../../public/product/bikle-modele-R-2024-2-1024x545-2.png" alt="">
                    </router-link>
                    </div>
                    <div class="item-desc">
                        <h3>{{ item.name }}</h3> 
                        <router-link to=""><p>Modification</p><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path d="M310.6 233.4c12.5 12.5 12.5 32.8 0 45.3l-192 192c-12.5 12.5-32.8 12.5-45.3 0s-12.5-32.8 0-45.3L242.7 256 73.4 86.6c-12.5-12.5-12.5-32.8 0-45.3s32.8-12.5 45.3 0l192 192z"/></svg></router-link>
                        <p>{{ item.price }} €</p>
                        <p>{{ item.category.name }}</p>
                    </div>
                    <div class="button">
                        <div class="btn-remove-item" @click="removeItem(item)"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 384 512">
                                <path
                                    d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z" />
                            </svg></div>

                    </div>
                </div>


            </div>

        </div>
        <button class="btn btn-primary" >Valider mon panier</button>
    </section>
</template>

<script setup>
import { useCartStore } from '../stores/cart.js';
import { storeToRefs } from 'pinia';


const store = useCartStore();

const { sortedItems } = store;
const { cartItems } = storeToRefs(store);


const removeItem = (item) => {
    store.removeItems(item);
};



</script>

<style scoped>
section {
    width: 100%;
    display: flex;
    flex-direction: column;
    align-items: center;
}

.title {
    width: 40%;
    text-align: center;
    border-bottom: 2px solid var(--black);
}

.title h2 {
    font-size: 3.5rem;
    font-weight: 300;
    font-family: "MuseoModerno", sans-serif;
}

.cart-item {
    width: 100%;
    display: flex;
    justify-content: space-between;
    margin-bottom: 10px;
}

.item {
    width: 100%;
    display: flex;
    flex-direction: row;
    padding: 2rem;
    border-bottom: 2px solid var(--black);
}
.item .img{
    width: 60%;
}
.item .img img{
    width: 100%;
background-size:contain ;
}

.item-desc {
    width: 25%;
    height: 100%;
   text-align: center;
  margin: 2rem; 
}


.item-desc h3 {
    width: 100%;
    font-size: 2rem;
    padding: 1.5rem;
    border-bottom: 1px solid var(--dark);
}

.item-desc a{
    width: 100%;
    display: flex;
    text-align: center; 
    align-items: center;
    text-decoration: none;
    color: var(--secondary);
    font-weight: bold;
}
.item-desc a svg{
    width: 20px;
    fill: var(--secondary);
}

.item-desc p{
    width: 100%;
    font-size: 1rem;
    font-weight: bold;
    padding: 1.5rem;
    
}


.btn-remove-item{
    width: 25%;
    cursor: pointer;
}
.btn-remove-item svg{
    width: 30px;
    fill: var(--secondary);

}

button{
    margin: 3rem;
}
</style>