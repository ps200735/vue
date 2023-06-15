<template>
    <main-header />
    <section class="hero__section">
        <div class="container">
            <div class="hero__text">
                <h4>Trade-in-offer</h4>
                <h1>Super value deals</h1>
                <h2>On all products</h2>
                <p>Save more with coupons & get up to 70% off!</p>
                <router-link to="/shop">
                    <action-button btnvalue="Start Shopping" />
                </router-link>
            </div>
        </div>
    </section>
    <service-section />
    <section class="feature__section">
        <div class="container">
            <featured-products :featuredProducts="featuredProducts" />
        </div>
    </section>

    <new-arrivals :newArrivals="newArrivals" />
    <main-footer />
</template>

<script>
import NewArrivals from "@/components/products/NewArrivals.vue";
import FeaturedProducts from "@/components/products/FeaturedProducts.vue";
import ActionButton from "@/components/ActionButton.vue";
import MainHeader from "@/components/MainHeader.vue";
import MainFooter from "@/components/MainFooter.vue";

import axios from "axios";
import { mapActions, mapState } from "vuex";

export default {
    name: "HomeView",
    data() {
        return {
            product: [],
        };
    },
    methods: {
        ...mapState(["products"]),
        ...mapActions(["set_products"]),
    },
    components: {
        
    
        NewArrivals,
        FeaturedProducts,
        ActionButton,
        MainHeader,
        MainFooter,
    },
    computed: {
        featuredProducts() {
            return this.product.slice(1, 5);
        },
        newArrivals() {
            return this.product.slice(5, 9);
        },
    },
    async created() {
        let res1 = await axios.get("http://127.0.0.1:8001/api/products");
        this.product = res1.data.results;
        this.set_products(this.product);
        console.log(this.$store.state.products[0].name);
        
    },
};
</script>

<style scoped>
/* Hero Section */
.hero__section {
    display: flex;
    align-items: center;
    justify-content: center;
    height: calc(100vh - 65px);
    background-image: url("@/assets/images/hero4.png");
    background-position: 60% 30%;
    background-size: cover;
}

.hero__text {
    display: flex;
    align-items: flex-start;
    justify-content: center;
    flex-direction: column;
}

.hero__text h4 {
    padding-bottom: 1rem;
}

.hero__text h1 {
    color: var(--dim-blue);
}

.hero__text p {
    margin-bottom: 1rem;
}

@media (min-width: 2000px) {
    .hero__section {
        background-position: 70% 12%;
        background-size: contain;
        background-repeat: no-repeat;
        background-color: #e3e6f3;
        height: 50vh;
    }
}

@media (min-width: 3000px) {
    .hero__section {
        background-position: 60% 30%;
    }
}

@media (max-width: 768px) {
    .hero__section {
        background-position: 70% 30%;
        background-size: cover;

    }
}

</style>
