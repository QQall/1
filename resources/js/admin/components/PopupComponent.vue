<template>
    <div class="Popup-modal" 
    v-if="Show_Popup" 
    @click="hide_Popup" 
    >
        <div @click.stop class="Popup-container">
            <slot name="header"></slot>
            <slot name="content"></slot>
        </div>
    </div>
</template>
<script>
    export default {
        name: 'Popup',
        props: {
            Show_Popup: {
                type: Boolean,
                default: false,
            }
        },
        data () {
            return {
            }
        },
        methods: {
            hide_Popup () {
                this.$emit('update:Show_Popup', false)
                this.$emit('close');
            },
            
        }
    }
</script>
<style scoped>
.Popup-modal{ 
    position: fixed;
    left: 0px;
    top: 0px;
    width: 100%;
    min-height: 100vh;
    background: #171717c4;
    display: flex;
    justify-content: center;
    align-items: center;
}
.Popup-container {
    position: relative;
    margin: auto;
    min-width: 400px;
    min-height: 300px;
    background: rgb(39, 39, 39);
    border-radius: 5px;
    padding: 20px;
}

</style>
