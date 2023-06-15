<template>
  <div class="sub-heading">
    <h2>{{ heading }}</h2>
  </div>
</template>

<script>
export default {
  name: "SubHeader",
  props: {
    heading: String,
  },
};
</script>

<style scoped>
.sub-heading {
  background-color: var(--dim-blue);
  color: white;
  height: 20vh;
  display: grid;
  place-content: center;
  text-align: center;
  margin-bottom: 2.5rem;
}

.sub-heading p {
  font-size: 1.9rem;
  color: var(--grey);
}
</style>