<template>
    <div class="columns is-four-fifths">
          
        <div class="box">
            <div class="column">
                <h2>Produtos</h2>
                <hr />
                <form @submit.prevent="saveProduct">
                    <div class="field">
                        <strong>Cadastrar:</strong>
                    </div>
                    <div class="field">
                        
                        <div v-html="msg" id="msg-send"></div>
                    </div>
                    <div class="field">
                        <label for="nomeProduto" class="label">Nome</label>
                        <input 
                            type="text" 
                            name="" 
                            id="nameProduct" 
                            class="input"
                            v-model="nameProduct"
                            required
                        />
                    </div>
                    <div class="field">
                        <label for="categoryId" class="label">ID Categoria</label>
                        <input 
                            type="number" 
                            name="" 
                            id="categoryId" 
                            class="input"
                            v-model="categoryId"
                            required
                        />
                    </div>
                    <div class="field">
                        <button type="submit" class="button">
                            Salvar
                        </button>
                    </div>
                </form>
                <hr>
                <table class="table is-fullwidth">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nome</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="item in listItems" :key="item.id">
                            <td>{{ item.id }}</td>
                            <td>{{ item.name }}</td>
                            <td>
                                <div class="buttons are-small">
                                    <router-link class="button is-primary" :to="'/editProduct/' + item.id">Editar</router-link>
                                    <button class="button is-danger" @click="deleteProduct(parseInt(item.id))" :to="item.id">Apagar</button>
                                </div>
                            </td>
                        </tr>
                    </tbody>

                </table>

            </div>
        </div>
    </div>
    
</template>

<script lang="ts">
import { defineComponent } from 'vue';
import IProducts from '@/interfaces/IProducts';
import ProductController from '../controllers/ProductController';

export default defineComponent({
    name: 'ProductsView',
    emits: ['onSaveProduct', 'onCloseDiv'],
    data (){
        
        return {
            nameProduct: '',
            categoryId: 0,
            listItems: [] as IProducts[],
            msg: '',
        }
    },
    methods: {
        saveProduct () {
            if(this.categoryId !== 0){
                ProductController.createProduct(this.nameProduct, this.categoryId);
                //reload na tabela
                this.getData();
                const msgSend = `<div class="notification is-primary">
                        <button class="delete"></button>
                        Produto cadastrado com sucesso!
                    </div>`;
                this.$emit('onSaveProduct',this.msg=msgSend);
            } else {
                const msgSend = `<div class="notification is-danger">
                        
                        Categoria ID inválida.
                    </div>`;
                this.$emit('onCloseDiv',this.msg=msgSend);
            } 
        },
        async getData() {
            const res = await ProductController.listAll();
            this.listItems = res;
        },
        closeDiv(){
            this.$emit('onCloseDiv',this.msg='');
            console.log('Fechando div');
        },
        deleteProduct(Id: number){
            console.log('Apagar Category ID: '+Id);
            //apagar pelo ID
            ProductController.deleteProduct(Id);
            const msgSend = `<div class="notification is-primary">
                    <button onclick="closeMsg()" class="delete"></button>
                    Produto apagada com sucesso!
                </div>`;
            this.$emit('onSaveProduct',this.msg=msgSend);
            return this.getData();
        }
        
    },
    mounted() {
        this.getData();
        this.$emit('onSaveProduct', {
            msg: ''
        });
        this.$emit('onCloseDiv', {msg:''});
    }
});
</script>

<style scoped>
    .projetos {
        padding: 1.25rem;
    }
    form{
        width: 520px;
    }
    h2{
        font-size: 21px;
    font-weight: bold;
    }
</style>