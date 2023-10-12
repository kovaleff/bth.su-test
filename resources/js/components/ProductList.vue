<template>
    <div class="product-list">
        <div class="products">
            <table>
                <thead>
                <tr>
                    <td>Артикул</td>
                    <td>Название</td>
                    <td>Статус</td>
                    <td>Атрибуты</td>
                </tr>
                </thead>
                <tbody>

                <tr v-for="(product,index) in products" :key="product.article" @click="cardView(index)">
                    <td>{{ product.article }}</td>
                    <td>{{ product.name }}</td>
                    <td>{{ product.status }}</td>
                    <td>{{ product.data }}</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="buttons">
        <button @click="addClicked">Добавить</button>
    </div>

    <div class="modal-form" v-if="isFormActive">
        <ProductForm :cancelForm="cancelForm"></ProductForm>
    </div>
    <div class="modal-form" v-if="isCardActive">
        <ProductCard :product="products[current]" :cancelForm="cancelForm"></ProductCard>
    </div>

</template>

<script setup>
import {reactive, ref, onBeforeMount, onUpdated, nextTick} from 'vue'
import api from '../api/api';
import ProductForm from './ProductForm.vue';
import ProductCard from './ProductCard.vue';

const products = ref([]);
let isFormActive = ref(false);
let isCardActive = ref(false);
let rerender = ref(true);
let current = ref(0);

function addClicked() {
    isFormActive.value = !isFormActive.value;
}
function cardView(index) {
    isCardActive.value = true;
    current.value = index;
}

function cancelForm() {
    isFormActive.value = false;
    isCardActive.value = false;
}

function getProducts() {
    api.get('/products').then(function (response) {
        products.value = response.data;
    }).catch(function (error) {
        console.log(error);
    });

}
onBeforeMount(() => {
    getProducts();
})

</script>

<style>
</style>
