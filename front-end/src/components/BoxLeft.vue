<template>
    <header style="display: table-cell;">
        <h2>
            Desafio
            <img src="../assets/logo.png" width="50" alt="logo">
        </h2>
        <nav class="panel mt-5">
            <ul>
                <li>
                    <router-link to="/" class="link">
                        <i class="fas fa-table" aria-hidden="true"></i>
                        Categorias
                    </router-link>
                </li>
                <li>
                    <router-link to="/products" class="link">
                        <i class="fas fa-bars"></i>
                        Produtos
                    </router-link>
                </li>
            </ul>
        </nav>
    </header>
</template>

<script lang="ts">
import { defineComponent } from 'vue';

export default defineComponent({
    name: 'BoxLeft'
});
</script>

<style>
header{
    background: #0d3b66;
    width: 100%;
    height: 100vh;
    padding: 20px;
}
@media only screen and (max-width: 768px){
    header{
        padding: 2.5rem;
        height: auto;
    } 
}
.panel li {
    margin: 8px 0;
}
.link {
    color: #fff;
}
.link:hover {
    color: #FAF0CA;
}
.link.router-link-active {
    color: #FAF0CA;
}
</style>