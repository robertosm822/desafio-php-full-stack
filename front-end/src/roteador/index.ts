import { RouteRecordRaw, createRouter, createWebHashHistory } from "vue-router";
import CategoriesView from '../views/CategoriesView.vue';
import ProductsView from '../views/ProductsView.vue';
import EditCategory from '../views/EditCategory.vue';
import EditProduct from '../views/EditProduct.vue';
//configurar os apontamentos das rotas
const rotas: RouteRecordRaw[] = [
    {
        path: '/',
        name: 'Categorias',
        component: CategoriesView
    },
    {
        path: '/products',
        name: 'Produtos',
        component: ProductsView
    },
    {
        path: '/editCategory/:id',
        name: 'Editar Categoria',
        component: EditCategory
    },
    {
        path: '/editProduct/:id',
        name: 'Editar Produto',
        component: EditProduct
    },
];

const roteador = createRouter({
    history: createWebHashHistory(),
    routes: rotas
});
export default roteador;