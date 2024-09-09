<template>
  <section>
    <div v-if="loading">requête en cours</div>
    <div v-if="error" class="error">{{ error }}</div>
    <div v-if="!loading && !error">
      <div class="row">
        <input type="search" placeholder="Rechercher un Produits" v-model="searchProducts">
      </div>
      <div class="" v-for="(products, categoryName) in groupedProducts" :key="categoryName">
        <h2 class="category">{{ categoryName }}</h2>

        <div class="product">
          <div v-for="(product, index) in products" :key="index" class="product-card">
            
            <div class="">
              <router-link :to="{ name: 'ProductId', params: { id: product.id } }">
              <div class="name-product">
              <h3>{{ product.name }}</h3>
              <span>{{ formatPrice(product.price) }} €</span>
            </div>
            <p class="description">{{ product.description }}</p>
            <img src="../../public/product/bikle-modele-R-2024-2-1024x545-2.png" alt="image produit">
          </router-link>
        </div>
          <div class="button">
            <button class="btn btn-add" @click="addProductToCart(product)">AJOUT PANIER</button>
              <button class="btn btn-custom">PERSONNALISATION</button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
import axios from "axios";
import { useCartStore } from "../stores/cart.js";

export default {
  data() {
    return {
      searchProducts: '', 
      products: [],
      loading: false,
      error: null,
    };
  },
  computed: {
    groupedProducts() {
      const searchTerm = this.searchProducts.toLowerCase(); 
      const grouped = {};

      this.products
        .filter(product => product.name.toLowerCase().includes(searchTerm)) 
        .forEach(product => {
          const categoryName = product.category.name;
          if (!grouped[categoryName]) {
            grouped[categoryName] = [];
          }
          grouped[categoryName].push(product);
        });
      return grouped;
    }
  },
  methods: {
    async fetchProduct() {
      this.loading = true;
      this.error = null;
      try {
        const response = await axios.get("http://127.0.0.1:8000/api/product/");
        this.products = response.data.getProductWithCategory;
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
      return val.toString().replace(/\B(?=(\d{3})+(?!\d))/g, "");
    }
  },
  async mounted() {
    await this.fetchProduct();
  },
};
</script>


<style scoped>
.row{
  width: 100%;
  display: flex;
  flex-direction: row;
  justify-content: center;
}
.row input{
  padding: 20px;
 font-size: 1rem;
  font-weight: 3rem;
  border-radius: 15px;
  
}
section{
  padding: 80px;
}
.category{
  font-size: 3rem;
  font-weight: bolder;
  margin: 0 80px;

}
.product {
  width: 100%;
  margin: 20px;
  padding: 20px;
  display: flex;
  flex-direction: row;
  flex-wrap: wrap;
}

.product-card {
  width: 40%;
  border-radius: 15px;
  background-color: var(--primary);
  padding: 25px;
  margin: 2%;
  box-shadow: rgba(0, 0, 0, 0.16) 0px 3px 6px, rgba(0, 0, 0, 0.23) 0px 3px 6px;
}
.product-card a{
  text-decoration: none;

}

.name-product {
  width: 100%;
  display: flex;
  flex-direction: row;
  justify-content: space-between;
  text-align: center;
  align-content: center;
}

.name-product h3 {
  color: var(--secondary);
  font-size: 3rem;
  margin-left: 20px;
}

.name-product span {
  color: var(--secondary);
  font-size: 2rem;
  margin-right: 20px;
}

.description {
  padding: 20px;
  font-size: 1.5rem;
  color: var(--black);
}

.product-card img {
  width: 100%;
  height: auto;
  margin-bottom: 5rem;
}

h2 {
  margin-top: 30px;
  color: #333;
}
.button{
  width: 100%;
  display: flex;
  flex-direction: row;
  justify-content: space-evenly;
}

</style>
