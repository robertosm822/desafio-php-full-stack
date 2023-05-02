<template>
    <div class="columns is-four-fifths">
          
        <div class="box">
            <div class="column">
                <h2>Editar Produto</h2>
                <hr />
                <form @submit.prevent="storeProduct">
                    
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
        storeProduct(){
            const Id: any = this.$route.params.id;
            const productId = parseInt(Id);
            ProductController.updateProduct(productId,this.nameProduct, this.categoryId );
            
            const msgSend = `<div class="notification is-primary">
                    <button onclick="closeMsg()" class="delete"></button>
                    Produto atualizada com sucesso!
                </div>`;
            this.$emit('onSaveProduct',this.msg=msgSend);
            return '';
        },
        async loadDataProduct(Id: number){
            //recuperar informacoes da categoria
            const productdata: any = await ProductController.getProductById(Id);
            
            this.nameProduct =productdata.name;
        }
        
    },
    mounted() {
        const Id: any = this.$route.params.id;
        this.categoryId = parseInt(Id);
        this.loadDataProduct(parseInt(Id));

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