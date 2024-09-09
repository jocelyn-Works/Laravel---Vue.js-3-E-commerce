import { createRouter, createWebHistory } from 'vue-router'
import HomeView from '@/views/HomeView.vue';
import ProductView from '@/views/ProductsView.vue';
import ProductIdVue from '@/views/ProductIdVue.vue';
import CartView from '@/views/CartView.vue';
import UserSignup from '@/components/userSignup.vue';
import login from '@/components/loginView.vue';

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes: [
    {
      path: '/',
      name: 'home',
      component: HomeView
    },
    {
      path: '/product',
      name: 'product',
      component: ProductView
    },
    { path: '/product/:id',
      name: 'ProductId',
      component: ProductIdVue
    },
    {
      path: '/cart',
      name: 'cart',
      component:CartView
    },
    {
      path: '/signup',
      name: 'signup',
      component:UserSignup
    },
    {
      path: '/login',
      name: 'login',
      component:login
    }
  ]
})

export default router
