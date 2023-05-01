<template>
        <div class="columns is-four-fifths">
          
          <div class="box">
            <div class="column">
                <FormAdd @aoSalvarTarefa="saveTask" />
            </div>
            <div class="column">
              <TaskBlock v-for="(tarefa, index) in tarefas" :key="index" :tarefa="tarefa" />
            
            </div>
          </div>
          
        </div>
  </template>
  
  <script lang="ts">
  //importante para definir um component no vue 3
  import { defineComponent } from 'vue';
  import FormAdd from '../components/FormAdd.vue';
  import TaskBlock from '../components/TaskBlock.vue';
  import ITasks from '../interfaces/ITasks';
  
  export default defineComponent({
      name: "App",
      components: { 
        FormAdd, 
        TaskBlock 
      },
      data () {
        return {
          tarefas: [] as ITasks[]
        }
      },
      //metodo que cria uma lista de tarefas em array
      methods: {
        saveTask (tarefa: ITasks){
          this.tarefas.push(tarefa);
        }
      },
  });
  </script>
  
  <style>
  
  </style>
  