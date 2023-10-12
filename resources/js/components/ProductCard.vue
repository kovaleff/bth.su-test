<template>
    <div class="add-form card-form dark-bg">
        <div class="card-title flex space-between">{{ product.name }}
            <a href="#" @click="isEditable=!isEditable"><img src="/images/edit.png" alt=""></a>
            <a href="#" @click="deleteProduct(product.id)"><img src="/images/delete.png" alt=""></a>
        </div>
        <form action="" @submit="handleForm">
            <div class="flex-column">
                <label for="article" class="">Артикул</label>
                <input type="text" id="article" v-model="product.article" v-if="isEditable">
                <span class="non-editable" v-if="!isEditable">{{product.article}}</span>
            </div>
            <div class="flex-column">
                <label for="name" class="">Имя</label>
                <input type="text" id="name" v-model="product.name" v-if="isEditable">
                <span class="non-editable" v-if="!isEditable">{{product.name}}</span>
            </div>
            <div class="flex-column">
                <label for="status" class="">Статус</label>
                <select name="status" id="status" v-model="product.status" v-if="isEditable">
                    <option>available</option>
                    <option>unavailable</option>
                </select>
                <span class="non-editable" v-if="!isEditable">{{product.status}}</span>
            </div>
            <div class="flex-column">
                <h2>Атрибуты</h2>
                <a href="#" @click="addAttr" v-if="isEditable">+Добавить аттрибуты</a>
                <div class="flex-row space-between attrs" v-for="(attr,index) in product.data">
                    <label class="">Имя</label>
                    <input type="text" name="attr-name"  v-model="product.data[index].attrName" v-if="isEditable">
                    <span class="non-editable" v-if="!isEditable">{{product.data[index].attrName}}</span>
                    <label for="name" class="">Имя</label>
                    <input type="text" name="attr-value"   v-model="product.data[index].attrValue" v-if="isEditable">
                    <span class="non-editable" v-if="!isEditable">{{product.data[index].attrValue}}</span>
                    <span class="contols"><a @click="removeAttr(index)" href="#"><img src="/images/delete.png" alt="" v-if="isEditable"></a></span>
                </div>
            </div>
<!--            <div><button type="submit">Создать</button></div>-->
            <div><button type="button" @click="props.cancelForm()">Отмена</button></div>
        </form>
    </div>
</template>

<script setup>
import {ref} from "vue";
import api from '../api/api';

const props = defineProps(['product','cancelForm']);
let isEditable = ref(false);

function deleteProduct(id){
    api.delete('/products',id).catch(function (error) {
        console.log(error);
    });
    props.cancelForm();
}
</script>

<style>

</style>
