<template>
<div id="layouts">
    <header>
        <div class="user-info">
            <div class="avatar">
                <img src="/img/4064.jpg">
            </div>
            <div class="login"></div>
            <div class="steamId">7894148</div>
        </div>
        <div class="btn-logout"><div class="icon icon-box-arrow-right"></div> Выйти </div>
    </header>
    <main>
    
        <div class="left-menu">
            <ul class="links">
                <li><router-link to="/admin"><div class="icon icon-home"></div> Главная </router-link></li>
                <li><router-link to="/admin/servers"><div class="icon icon-database"></div> Сервера </router-link></li>
                <li><router-link to="/admin/product"><div class="icon icon-Box-Minimalistic"></div> Товары </router-link></li>
                <li><router-link to="/admin/users"><div class="icon icon-multi-user"></div> Пользователи </router-link></li>
                <li><router-link to="/admin/history"><div class="icon icon-History"></div> История покупок </router-link></li>
                <li><router-link to="/admin/setting"><div class="icon icon-gear"></div> Настройки </router-link></li>
            </ul>
            <div class="copy">
                <div class="title"> QCRM</div>
                <div class="desc">
                    v 0.1
                </div>
            </div>
        </div>
        <div class="right-content">
            <slot/>
        </div>
    </main>
</div>
</template>

<script>
export default {
    data () {
        return {
            user: null
        }
    },
    methods: {

    },
    mounted() {
    }
}
</script>

<style scoped>
#layouts {
    min-width: 100%;
    margin: 0px auto;
    display: flex;
    flex-direction: column;
    min-height: 100%;
    align-items: center;
    background: #171717;
    background-size: 30%;
}
header {
    width: 1200px;
    min-height: 80px;
    background: rgb(29 29 29 / 90%);
    outline-offset: 2px;
    border-bottom: 1px solid #373737;
    box-shadow: 0 1px rgb(116 116 116 / 27%);
    display: flex;
    flex-direction: row;
    align-items: center;
    padding: 0px 15px;
}
header > .user-info {
    display: grid;
    grid-template-columns: 64px minmax(100px, auto);
    grid-template-rows: 1fr 1fr;
    align-items: center;
    grid-gap: 0px 10px;
}
header > .user-info > .avatar{
    width: 64px;
    height: 64px;
    background: rgb(20 20 20);
    border-radius: 5px;
    grid-row: 1/3;
}
header > .user-info > .avatar > img{
    border-radius: 5px;
}
header > .user-info > .login{
    grid-column: 2;
    grid-row: 1;
}
header > .user-info > .steamId{
    grid-column: 2;
    grid-row: 2;
}
header > .btn-logout {
    padding: 10px;
    background: rgb(106 106 106 / 12%);
    border-radius: 5px;
    border: 1px solid rgb(122 122 122 / 60%);
    margin-left: auto;
    cursor: pointer;
    display: flex;
    align-items: center;
}
header > .btn-logout:hover{
    background: rgb(255, 115, 115);
    transform: scale(0.95);
    transition: 0.3s
}
main {
    width: 1200px;
    min-height: 600px;
    background: #171717;
    flex: 1 0 auto;
    display: flex;
    justify-content: flex-start;
    flex-direction: row;
}
main > .left-menu {
    min-width: 300px;
    min-height: 600px;
    background: rgb(29 29 29 / 90%);
    display: flex;
    flex-direction: column;
    padding: 20px;
}
main > .left-menu > .links {

}
main > .left-menu > .links {
    
}
main > .left-menu > .links > li{
    margin: 10px 10px;
    transition: 0.3s;
    width: 100%;
}
main > .left-menu > .links > li:hover{
    margin-left: 15px;
    transition: 0.3s;
    color: rgb(255, 91, 62);
 }
main > .left-menu > .links > li > a{
    display: flex;
    align-items: center;
}

main > .left-menu > .copy {
    margin-top: auto;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    opacity: 0.10;
    transition: 0.3s;
    cursor: pointer;
}
main > .left-menu > .copy:hover {
    opacity: 1;
    transition: 0.3s;
}
main > .left-menu > .copy > .title {
    font-size: 32px;
    font-weight: 600;
}
main > .left-menu > .copy > .desc {
}
main > .right-content {
    width: 900px;
    min-height: 600px;
    background: rgb(39, 39, 39);
    padding: 20px;
}
footer {
    width: 100%;
    min-height: 80px;
    display: flex;
    flex: 0 0 auto;
}
.router-link-active {
    color: rgb(255, 91, 62);
}
</style>

