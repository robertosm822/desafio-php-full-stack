<template>
    <div class="columns is-four-fifths">
          
        <div class="box">
            <div class="column">
                <h2>Editar Categoria</h2>
                <hr />
                <form @submit.prevent="storeCategory">
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
                        <input type="hidden" name="categoryId" v-model="categoryId" required>
                    </div>
                    
                    <div class="field">
                        <button type="submit" class="button">
                            Editar
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
</template>

<script lang="ts">
import ICategory from '@/interfaces/ICategory';
import { defineComponent } from 'vue';
import CategoryController from '@/controllers/CategoryController';
export default defineComponent({
    name: 'EditCategory',
    data (){
        
        return {
            nameCategory: '',
            listItems: [] as ICategory[],
            msg: '',
            categoryId: 0,
        }
    },
    methods: {
        storeCategory(){

            CategoryController.updateCategory(this.categoryId, this.nameCategory);
            
            const msgSend = `<div class="notification is-primary">
                    <button class="delete"></button>
                    Categoria atualizada com sucesso!
                </div>`;
            this.$emit('onsaveCategory',this.msg=msgSend);
            return '';
        },
        async loadDataCategory(Id: number){
            //recuperar informacoes da categoria
            const categorydata: any = await CategoryController.getCategoryById(Id);
            console.log(categorydata);
            this.nameCategory =categorydata.name;
        }
    },
    mounted() {
        const Id: any = this.$route.params.id;
        this.categoryId = parseInt(Id);
        this.loadDataCategory(parseInt(Id))
    }
});
</script>