import { defineStore } from 'pinia';

const LOCAL_STORAGE_KEY = 'cart';

export const useCartStore = defineStore('cart', {
  state: () => ({
    cartItems: JSON.parse(localStorage.getItem(LOCAL_STORAGE_KEY)) || []
  }),
  getters: {
    sortedItems(state) {
      return state.cartItems.sort((a, b) => a.name.localeCompare(b.name));
    }
  },
  actions: {
    addItems(item) {
      const productInCart = this.cartItems.find(product => product.id === item.id);
      if (productInCart) {
        productInCart.quantity++;
      } else {
        this.cartItems.push({ ...item, quantity: 1 });
      }
      this.saveToLocalStorage();
    },
    removeItems(item) {
      this.cartItems = this.cartItems.filter(product => product.id !== item.id);
      this.saveToLocalStorage();
    },
    saveToLocalStorage() {
      localStorage.setItem(LOCAL_STORAGE_KEY, JSON.stringify(this.cartItems));
    },
    clearCart() {
      this.cartItems = [];
      this.saveToLocalStorage();
    },
  
  }
});

