<template>
<div class="statistics-block">
    <div class="block-info">
        <div class="icon-big icon-multi-user"></div>
        <div class="inform">
            <div class="title">Пользователей</div>
            <div class="count">{{UserCount}}</div>
        </div>
    </div>
    <div class="block-info">
        <div class="icon-big icon-Box-Minimalistic"></div>
        <div class="inform">
            <div class="title">Товаров</div>
            <div class="count">{{ ProductCoun }}</div>
        </div>
    </div>
    <div class="block-info">
        <div class="icon-big icon-Ruble"></div>
        <div class="inform">
            <div class="title">Покупки</div>
            <div class="count">{{ DonateCoun }}</div>
        </div>
    </div>
</div>
</template>
<script>
  export default {
    data () {
            return {
                UserCount: 0,
                ProductCoun: 0,
                DonateCoun:  0,
                errors: [],
            }
        },
    mounted() {
        this.getUserCoun();
        this.getProductCoun();
        this.getDonateCoun();
    },
    methods: {
        async getUserCoun(){
            try {
                const res =  await axios.get('/api/user-count');
                this.UserCount = res.data;
                console.log (this.UserCount);
            } 
            catch (error) {
                this.errors = error.response.data.errors;
                console.log(this.errors);
            }
        },
        async getProductCoun(){
            try {
                const res =  await axios.get('/api/product-count');
                this.ProductCoun = res.data;
                console.log (this.ProductCoun);
            } 
            catch (error) {
                this.errors = error.response.data.errors;
                console.log(this.errors);
            }
        },
        async getDonateCoun(){
            console.log ("admin index");
        },
    }
  }
</script>
<style scoped>
.statistics-block {
    width: 100%;
    display: flex;
    justify-content: space-between;
}
.statistics-block > .block-info {
    width: 250px;
    min-height: 120px;
    background: rgb(29 29 29 / 90%);
    margin: 0px 15px;
    border-radius: 5px;
    padding: 10px;
    display: flex;
    justify-content: center;
    align-items: center;
    cursor: pointer;
}
.statistics-block > .block-info > .inform {
    margin-left: 10px;

}
.statistics-block > .block-info > .inform > .title { 
font-size: 16px;
}
.statistics-block > .block-info:hover { 
    background: rgb(26, 26, 26);
    outline: 2px solid rgba(141, 141, 141, 0.09);
}

</style>
