import { createRouter, createWebHistory } from "vue-router";
import store from "@/store/store"
import HomeView from "../views/UserViews/HomeView.vue";
const routes = [
  {
    path: "/",
    name: "home",
    component: HomeView,
  },
  {
    path: '/login',
    name: 'login',
    component: () => import("../views/auth/Login.vue"),
  },
  {
    path: '/signup',
    name: 'signup',
    component: () => import("../views/auth/Signup.vue"),
  },
  {
    path: "/about",
    name: "about",
    
    component: () =>
      import( "../views/UserViews/AboutView.vue"),
  },
  {
    path: "/shop",
    name: "shop",
    component: () => import("../views/UserViews/ShopView.vue"),
  },
  
  {
    path: "/contact",
    name: "contact",
    component: () => import("../views/UserViews/ContactView.vue"),
  },
  {
    path: "/cart",
    name: "cart",
    component: () => import("../views/UserViews/CartView.vue"),
  },
  {
    path: "/checkout",
    name: "checkout",
    component: () => import("../views/UserViews/CheckoutView.vue"),
    // beforeEnter: (to, from, next) => {
    //   if (store.state.UserViews) {
    //     next();
    //   } else {
    //     next("/login");
    //   }
    // }
  },
  {
    path: '/cart/:id',
    name: 'cartItem',
    component: () => import("../views/UserViews/CartItemView.vue"),
  }
];


const router = createRouter({
  history: createWebHistory(process.env.BASE_URL),
  routes,
  scrollBehavior(to, from, savedPosition) {
    if (savedPosition) {
      return savedPosition
    } else {
      return { top: 0 }
    }
  }
});

// Method 2 of setting navigation guard

// const openResources = ['home', 'login', 'signup', 'forgot-password', 'about', 'shop',
//   'blog', 'contact', 'cart', 'cartItem'];
// router.beforeEach((to, from, next) => {
//   if (openResources.includes(to.name)) {
//     next()
//   } else if (store.state.UserViews) {
//     next()
//   } else {
//     next('/login')
//   }
// })

export default router;
