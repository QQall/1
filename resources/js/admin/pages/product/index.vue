<template>
<div class="header-component">
<div class="search">
        <div class="icon icon-search"></div>
        <input type="text" v-model="search" placeholder="Поиск по названию">
</div>
    <div @click="PopupCreate" class="btn btn-normal btn-black"><div class="icon icon-plus"></div> Добавить </div>
</div>
<div class="table-list">
    <div class="table-header">
        <div class="table-wrap">
            <div class="table-line-value">Index</div>
                <div class="table-line-value">Название</div>
                <div class="table-line-value">Цена</div>
                <div class="table-line-value">Скидка</div>
        </div>
        <div class="table-btns"></div>
    </div>
    <Loading v-if="isLoading"></Loading>
    <div class="table-line" v-for="(product, index) in filter()" :key="product.id">
        <div class="table-wrap">
            <div class="table-line-value">{{ product.id }}</div>
            <div class="table-line-value" v-html="filterColored(product.name)"></div>
            <div class="table-line-value">{{ product.price }}</div>
            <div class="table-line-value">{{ product.discount }}</div>
        </div>
        <div @click="PopupEdit (index)" class="btn btn-icons btn-green"><div class="icon icon-Pen"></div></div>
    </div>
</div>

<!-- MODAL CREATE PRODUCT START -->
<Transition>
    <Popup v-model:Show_Popup="VisiblePopupCreate" @close="Remover">
        <template v-slot:header>
            <div class="title">Добавление товара</div>
        </template>
        <template v-slot:content>
            <div class="forms">
                <div class="input"><label>Название:</label>
                <input type="text" v-model="name" :class="{ 'error-input': errors.name }" placeholder="Premium"></div>
                <div class="input"><label>Цена:</label>
                <input type="text" v-model="price" :class="{ 'error-input': errors.price }" placeholder="100 ₽"> </div>
                <div class="input"><label>Скидка:</label>
                <input type="text" v-model="discount" :class="{ 'error-input': errors.discount }" placeholder="20%"></div>
                <button @click.prevent="Create" class="btn btn-normal btn-green">Создать</button>
            </div>
        </template>
    </Popup>
</Transition>
<!-- MODAL CREATE PRODUCT END -->

<!-- MODAL EDIT PRODUCT START -->
<Transition>
    <Popup v-model:Show_Popup="VisiblePopupEdit" @close="Remover">
        <template v-slot:header>
            <div class="title">Редактирование товара</div>
        </template>
        <template v-slot:content>
            <div class="forms">
                <div class="input"><label>Название:</label>
                    <input type="text" v-model="name" :class="{ 'error-input': errors.name }" placeholder="Premium"></div>
                <div class="input"><label>Цена:</label>
                    <input type="text" v-model="price" :class="{ 'error-input': errors.price }" placeholder="100 ₽"> </div>
                <div class="input"><label>Скидка:</label>
                    <input type="text" v-model="discount" :class="{ 'error-input': errors.discount }" placeholder="20%"> </div>

                <div class="btn-list">
                <button @click.prevent="Edit" class="btn btn-normal btn-green">Сохранить</button>
                <button @click.prevent="Delete" class="btn btn-normal btn-red">Удалить</button>
                </div>
            </div>
        </template>
    </Popup>
</Transition>
<!-- MODAL EDIT PRODUCT END -->
</template>
<script>
 import toast from '../../../toast.js'
    export default {
        data () {
            return {
                products: [],
                search: "",
                id: null,
                name: null,
                price: null,
                discount: null,
                message: null,
                errors: {
                    name: false,
                    price: false,
                    discount: false
                },
                isLoading: false,
                VisiblePopupCreate: false,
                VisiblePopupEdit: false,
            }
        },
        mounted() {
            this.getList();
        },
        computed: {
        },
        methods: {
            //create popup
            PopupCreate () {
                this.VisiblePopupCreate = true;
            },
            //popup edit
            PopupEdit (index) {
                const filter = this.filter();
                this.id = filter[index].id;
                this.name = filter[index].name;
                this.price = filter[index].price;
                this.discount = filter[index].discount;
                this.VisiblePopupEdit = true;
            },
            //clear forms
            Remover () {
                this.name = null;
                this.price = null;
                this.discount = null;
                this.VisiblePopupEdit = false;
                this.getList();
                this.errors = {
                    name: false,
                    price: false,
                    discount: false
                };
            },
            //toast
            CreateToast(Messages, status) {
                if (!status) {
                    for (let field in Messages) {
                        const errorMessage = Messages[field][0];
                        toast.error(errorMessage);
                    }
                }else {
                    toast.success(Messages);
                }
            },
            filter() {
                if (this.search) {
                const filteredProduct = this.products.filter(product => product.name.toLowerCase().includes(this.search.toLowerCase()));
                    if (filteredProduct.length > 0) {
                    return filteredProduct;
                    } else {
                       return console.log("Товар не найден");
                    }
                }
                return this.products;
            },
            filterColored(name) {
                if (this.search && name.toLowerCase().includes(this.search.toLowerCase())) {
                    const regex = new RegExp(this.search, 'gi');
                    return name.replace(regex, '<span style="color: #3fc733;">$&</span>');
                }
                    return name;
            },
            //list
            async getList(){
                try {
                    this.isLoading = true;
                    const res =  await axios.get('/api/product-list');
                    this.products = res.data;
                    this.isLoading = false;
                } 
                catch (error) {
                    this.errors = error.response.data.errors;
                    this.CreateToast(this.errors, false);
                }
            },
            //create
            async Create () {
                try{
                    const response = await axios.post ('/api/create-product', {
                    name: this.name,
                    price: this.price,
                    discount: this.discount,});

                    this.CreateToast(response.data.message, true);
                    this.VisiblePopupCreate = false;
                    this.Remover();
                }
                catch(error)
                {
                    this.errors = error.response.data.errors;
                    this.CreateToast(this.errors, false);
                }
            },
            //edit
            async Edit () {
                try {
                    const response = await axios.patch ("/api/edit-product", {
                    id: this.id,
                    name: this.name,
                    price: this.price,
                    discount: this.discount,});

                    this.CreateToast(response.data.message, true);
                    this.Remover();
                }catch(error){
                    this.errors = error.response.data.errors;
                    this.CreateToast(this.errors, false);
                }
            },
            // delete
            async Delete() {
                try{
                    const response = await axios.delete (`/api/delete-product/${this.id}`);

                    this.CreateToast(response.data.message, true);
                    this.Remover();
                }catch (error){
                    this.CreateToast(error.response.data.message, error.response.data.status);
                }
            }
        }
    }
</script>
<style scoped>
.error-input {
    border: 1px solid rgb(255, 91, 62);
    background: #1b1b1b !important;
}
.v-enter-active,.v-leave-active {
  transition: opacity 0.3s;
 
}
.v-enter-from,.v-leave-to {
  opacity: 0;
}

.input {
    display: flex;
    flex-direction: column;
}

.input > label {
    margin-block: 5px;
    font-weight: 400;
}
.input > input {
    background: #161616;
    width: 100%;
    height: 30px;
    border-radius: 5px;
    padding: 0px 10px;
    color: #ffffff;
    font-size: 14px;
}
.input > input::placeholder  {
    color: #4c4c4c;
}
.input > input:focus {
    background: #0f0f0f;
}
.Popup-container> .title {
    text-align: center;
    font-size: 18px;
    font-weight: 500;
    margin-bottom: 20px;
}
.forms > .btn {
    width: 100%;
    margin-top: 15px;
}
.forms > .btn-list > .btn-red {
    width: 100%;
    margin-left: 10px;
}
.forms > .btn-list > .btn-green {
    width: 100%;
    margin-right: 10px;
}
.btn-list {
    display: flex;
    justify-content: center;
    align-items: center;
    margin-top: 10px;
}
</style>
