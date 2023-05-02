<template>
    <div class="columns is-four-fifths">
          
        <div class="box">
            <div class="column">
                <h2>Categorias</h2>
                <hr />
                <form @submit.prevent="saveCategory">
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
                            id="nameCategory" 
                            class="input"
                            v-model="nameCategory"
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
                                    <router-link class="button is-primary" :to="'/editCategory/' + item.id">Editar</router-link>
                                    <button class="button is-danger" @click="deleteCategory(parseInt(item.id))" :to="item.id">Apagar</button>
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
import ICategory from '@/interfaces/ICategory';
import CategoryController from '../controllers/CategoryController';

export default defineComponent({
    name: 'CategoriesView',
    emits: ['onsaveCategory', 'onCloseDiv'],
    data (){
        
        return {
            nameCategory: '',
            listItems: [] as ICategory[],
            msg: '',
        }
    },
    methods: {
        saveCategory () {

            CategoryController.createCategory(this.nameCategory);
            //reload na tabela
            this.getData();
            const msgSend = `<div class="notification is-primary">
                    <button onclick="closeMsg()" class="delete"></button>
                    Categoria cadastrado com sucesso!
                </div>`;
            this.$emit('onsaveCategory',this.msg=msgSend);
        },
        async getData() {
            const res = await CategoryController.listAll();
            return this.listItems = res;
        },
        deleteCategory(Id: number){
            console.log('Apagar Category ID: '+Id);
            //apagar pelo ID
            CategoryController.deleteCategory(Id);
            const msgSend = `<div class="notification is-primary">
                    <button onclick="closeMsg()" class="delete"></button>
                    Categoria apagada com sucesso!
                </div>`;
            this.$emit('onsaveCategory',this.msg=msgSend);
            return this.getData();
        }
        
    },
    mounted() {
        this.getData();
        this.$emit('onsaveCategory', {
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