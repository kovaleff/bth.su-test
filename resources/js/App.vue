<template>
    <ProductList :key="componentKey"></ProductList>
</template>
<script>
    import ProductList from "./components/ProductList.vue";
    export default {
        name: 'App',
        components: {
            ProductList,
        }
    }
</script>
