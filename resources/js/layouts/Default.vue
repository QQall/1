<template>
<div id="layouts">
    <header>
    <div class="logo">
        <router-link to="/">
            <img src="public/img/test-logo.png" alt="">
        </router-link>
    </div> 
    
    <ul class="links">
        <li><router-link to="/"> Главная </router-link></li>
        <li><router-link to="/cabinet"> Кабинет</router-link></li>
        <li><router-link to="/about"> О нас </router-link></li>
        <li><router-link to="/servers"> Список серверов </router-link></li>
        <li><router-link to="/admin"> Админка </router-link></li>
    </ul>
    <div class="btn-pay">Пополнить счёт</div>
    </header>
    <main>
        <slot/>
    </main>
    <footer>
        <div class="copy">
            <div class="logo">CYRAX 2023-2024</div>
            <div class="desc">Система авто-доната для вашего сервера!</div>
        </div>
    </footer>
</div>
</template>
<script>
export default {
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
    background: #171717 url(../../img/pattern.png) repeat;
    background-size: 30%;
}
header {
    width: 1200px;
    min-height: 80px;
    background: rgb(29 29 29 / 90%);
    outline: 1px solid rgb(88 88 88 / 16%);
    outline-offset: 2px;
    border: 1px solid rgb(86 86 86 / 9%);
    box-shadow: 0 1px rgb(116 116 116 / 27%);
    display: flex;
    flex-direction: row;
    align-items: center;
    justify-content: center;
    padding: 0px 15px;
    border-radius: 5px;
}
header > .links {
 display: flex;
}
header > .links > ul{

}
header > .links > li{
    padding: 0px 20px;
    transition: 0.3s;
    color: white;
}
header > .links > li:hover{
    transform:scale(1.05);
    color: #FF4C2B;
    transition: 0.3s;
}
header > .btn-pay {
    background: rgb(106 106 106 / 12%);
    border-radius: 5px;
    border: 1px solid rgb(122 122 122 /60%);
    cursor: pointer;
    padding: 10px;
    margin-left: auto;
    transition: all 0.3s ease 0s;
}
header > .logo {
    background: rgb(20 20 20);
    padding: 10px;
    border-radius: 5px;
}

header > .logo:hover {
    background: rgb(56, 56, 56)
}
header > .btn-pay:hover {
    transform: scale(0.95);
    transition: all 0.3s ease 0s;
    background: rgb(255, 91, 62);
    border: 1px solid white;
}
main {
    width: 1200px;
    min-height: 600px;
    flex: 1 0 auto;
    padding: 30px 0px;
}
footer {
    width: 1200px;
    min-height: 80px;
    background: rgb(29 29 29 / 90%);
    display: flex;
    flex: 0 0 auto;
    padding: 0px 20px;
    border-radius: 5px;
    opacity: .20;
    transition: .3s;
    align-items: center;
}
footer:hover{
    opacity: 1;
    transition: .3s;
}
footer > .copy {

}
footer > .copy > .logo {
    
}
footer > .copy > .desc {
    
}
.router-link-active {
    color: rgb(255, 91, 62);
}
</style>