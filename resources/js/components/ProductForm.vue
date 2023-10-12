<template>
    <div class="add-form dark-bg">
        <h1>Добавить продукт</h1>
        <form action="" @submit="handleForm">
            <div class="flex-column">
                <label for="article" class="">Артикул</label>
                <input type="text" id="article" v-model="product.article">
            </div>
            <div class="flex-column">
                <label for="name" class="">Имя</label>
                <input type="text" id="name" v-model="product.name">
            </div>
            <div class="flex-column">
                <label for="status" class="">Статус</label>
                <select name="status" id="status" v-model="product.status">
                    <option>available</option>
                    <option>unavailable</option>
                </select>
            </div>
            <div class="flex-column">
                <h2>Атрибуты</h2>
                <a href="#" @click="addAttr">+Добавить аттрибуты</a>
                <div class="flex-row space-between attrs" v-for="(attr,index) in product.data">
                    <label class="">Имя</label>
                    <label class="err" v-if="nameError">{{nameError}}</label>
                    <input type="text" name="attr-name"  v-model="product.data[index].attrName">
                    <label for="name" class="">Имя</label>
                    <label class="err" v-if="articleError">{{articleError}}</label>
                    <input type="text" name="attr-value"   v-model="product.data[index].attrValue">
                    <span class="contols"><a @click="removeAttr(index)" href="#"><img src="/images/delete.png" alt=""></a></span>
                </div>
            </div>
            <div><button type="submit">Создать</button></div>
            <div><button type="button" @click="props.cancelForm()">Отмена</button></div>
        </form>
    </div>
</template>

<script setup>
import {reactive, ref} from 'vue'
import api from '../api/api';

const emit = defineEmits(['cancelForm']);
const props = defineProps(['cancelForm']);
let nameError = ref(false);
let articleError = ref(false);

let product = reactive(
    {
        article : '',
        name : '',
        status : 'available',
        data : []
    })

    const handleForm = () => {
      //todo client validation

        return api.post('/products', product).then(function (response) {
            console.log(response);
            nameError.value = false;
            articleError.value = false;
        }).catch(function (error) {
            nameError.value = error.response.data.errors.article[0];
            articleError.value = error.response.data.errors.name[0];
            alert(nameError.value + articleError.value);
        });
    }

    const removeAttr = (index) => {
        product.data.splice(index, 1);
    }
    const addAttr = (e) => {
        // e.preventDefault();
        product.data.push({
            attrName:'',
            attrValue:'',
        })
    }
</script>

<style>

</style>
