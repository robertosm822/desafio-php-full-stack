<template>
  <div class="columns is-gapless is-multiline">
    <div class="columns is-one-quarter" style="padding-right: 55px;display: table-cell;">
      <BoxLeft />
    </div>

      <div class="columns is-four-fifths">
      <!-- aqui vai a view correspondente -->
        <router-view></router-view>
      </div>
  </div>
</template>

<script lang="ts">
//importante para definir um component no vue 3
import { defineComponent } from 'vue';
import BoxLeft from './components/BoxLeft.vue';

export default defineComponent({
    name: "App",
    components: {
    BoxLeft
}
});
</script>

<style>

</style>
