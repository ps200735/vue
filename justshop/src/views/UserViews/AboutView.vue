<template>
  <main-header />
  <sub-header heading="#WhoWeAre" subHeading="Get to know us" />
  <div class="container">
    <article>
      <img src="@/assets/images/a6.webp" class="about-img" alt="Who we are" />
      <div class="about-text">
        <h1>Who We Are ?</h1>
        <p>At the core of our values is a commitment to prompt delivery and prioritizing customer satisfaction.
             Through our platform, we seamlessly link you with top-notch service providers in your vicinity.
              Our dynamic team consists of enthusiastic individuals who are devoted to delivering unparalleled service
               excellence.</p>
      </div>
    </article>
  </div>
  <main-footer />
</template>

<script>
import SubHeader from "@/components/SubHeader.vue";
import MainHeader from "@/components/MainHeader.vue";
import MainFooter from "@/components/MainFooter.vue";
export default {
  components: { SubHeader, MainHeader, MainFooter },
  name: "AboutView",
};
</script>

<style scoped>
article {
  display: flex;
  gap: 4rem;
  margin-bottom: 2.5rem;
}
.about-img {
  height: 50vh;
  width: 50%;
  object-fit: cover;
}

.about-text {
  width: 50%;
}

.about-text p {
  line-height: 25px;
}







@media (max-width: 700px) {
  article {
    flex-direction: column;
  }
  
  .about-text {
    width: 100%;
  }
  
  .about-img {
    height: 40vh;
    width: 100%;
  }

  h1 {
    font-size: 4rem;
  }
}
</style>
