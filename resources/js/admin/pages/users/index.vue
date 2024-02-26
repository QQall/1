<template>
    <div class="header-component">
        <div class="search">
            <div class="icon icon-search"></div>
            <input type="text" v-model="search" placeholder="Discord_id">
        </div>
    </div>
    <div class="table-list">
        <div class="table-header">
            <div class="table-wrap">
                <div class="table-line-value">Index</div>
                <div class="table-line-value">Discord_id</div>
                <div class="table-line-value">Логин</div>
                <div class="table-line-value">Баланс</div>
                <div class="table-line-value">Бан</div>
            </div>
            <div class="table-btns"></div>
        </div>
        <Loading v-if="isLoading"></Loading> 

    <div  class="table-line" v-for="(user, index) in filter()" :key="user.id">
        <div class="table-wrap">
            <div class="table-line-value">{{ user.id }}</div>
            <div class="table-line-value" v-html="filterColored(user.discord_id)"></div>
            <div class="table-line-value">{{ user.name }}</div>
            <div class="table-line-value">{{ user.balance }}</div>
            <div class="table-line-value">{{ user.ban }}</div>
        </div>
        <div @click="PopupEdit (index)" class="btn btn-icons btn-green"><div class="icon icon-Pen"></div></div>
    </div>
    </div>
<!-- MODAL EDIT SERVER START -->
<Transition>
<Popup v-model:Show_Popup="VisiblePopupEdit" @close="Remover">
    <template v-slot:header>
        <div class="title">Редактирование сервера</div>
    </template>
    <template v-slot:content>
        <div class="forms" >
            <div class="input"><label>Discord_id:</label>
                <input v-model="discord_id" type="text" disabled>
            </div>
            <div class="input"><label>Логин:</label>
                <input v-model="name" type="text" disabled> 
            </div>
            <div class="input"><label>Баланс:</label>
                <input v-model="balance" type="text" :class="{ 'error-input': errors.balance }"> 
            </div>
            <div class="input"><label>Бан:</label>
                <input v-model="ban" type="text" :class="{ 'error-input': errors.ban }">
            </div>
            <div class="btn-list">
            <button @click.prevent="Edit" class="btn btn-normal btn-green">Сохранить</button>
            </div>
        </div>
    </template>
</Popup>
</Transition>
<!-- MODAL EDIT SERVER END -->
</template>
<script>
import toast from '../../../toast.js'
    export default {
        data () {
            return {
                search: "",
                users: [],
                id: null,
                discord_id: null,
                name: null,
                balance: null,
                ban: null,
                errors: {
                    balance: false,
                    ban: false
                },
                isLoading: false,
                VisiblePopupCreate: false,
                VisiblePopupEdit: false
            }
        },
        mounted() {
            this.getList();
        },
        methods: {
            //edit popup
            PopupEdit (index) {
                const filter = this.filter();
                this.id = filter[index].id;
                this.discord_id = filter[index].discord_id;
                this.name = filter[index].name;
                this.balance = filter[index].balance;
                this.ban = filter[index].ban;
                // this.avatar = filter[index].avatar;
                this.VisiblePopupEdit = true;
            },
            //clear forms
            Remover () {
                this.balance = null;
                this.ban = null;
                this.VisiblePopupEdit = false;
                this.getList();
                this.errors = {
                    balance: false,
                    ban: false
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
            //search filter
            filter() {
                if (this.search) {
                const filtered = this.users.filter(user=> user.discord_id.toLowerCase().includes(this.search.toLowerCase()));
                    if (filtered.length > 0) {
                    return filtered;
                    } else {
                       return console.log("Товар не найден");
                    }
                }
                return this.users;
            },
            filterColored(discord_id) {
                if (this.search && discord_id.toLowerCase().includes(this.search.toLowerCase())) {
                    const regex = new RegExp(this.search, 'gi');
                    return discord_id.replace(regex, '<span style="color: #3fc733;">$&</span>');
                }
                    return discord_id;
            },
            //list
            async getList(){
                try {
                    this.isLoading = true;
                    const res =  await axios.get('/api/user-list');
                    this.users = res.data;
                    this.isLoading = false;
                } 
                catch (error) {
                    this.errors = error.response.data.errors;
                    this.CreateToast(this.errors, false);
                }
            },
            //edit
            async Edit () {
                try {
                    const response = await axios.patch ("/api/edit-user", {
                    id: this.id,
                    balance: this.balance,
                    ban: this.ban,});

                    this.CreateToast(response.data.message, true);
                    this.Remover();
                }catch(error){
                    this.errors = error.response.data.errors;
                    this.CreateToast(this.errors, false);
                }
            },
        }
    }
</script>
    <style scoped>
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
        border: 1px solid rgb(255, 91, 62);
    }
    .input > input:disabled {
        color: #4c4c4c;
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
    }
    .btn-list {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: 10px;
    }
</style>
    