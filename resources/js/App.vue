<template>
    <component :is="layout">
        <router-view/>
    </component>
</template>
<script>
export default {
    
    data() {
        return {
        }
    },
    computed: {
            //Это самое вычисляемое свойство
            layout(){
                //Вернем имя шаблона из роута или дефолтное значение 
                  //(шаблон для страниц, для которых мы не указали шаблон)
                return this.$route.meta.layout || "default-layout" 
            }
        }
    
}
</script>