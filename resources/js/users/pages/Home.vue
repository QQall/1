<template>
 <div class="lending">
    <div class="title">CYRAX - CRM</div>
    <div class="desc">
        Lorem ipsum dolor sit amet consectetur adipisicing elit. 
        Magni dignissimos quas rem eaque ex, veritatis qui enim tempora ab, dolorem assumenda quo delectus consequuntur ap
        eriam odio, sed quis unde! Quibusdam.
    </div>
    <router-link class="btn-play" to="/servers"> Начать играть </router-link>
 </div>

 <div class="socials">
    <div class="title">Мы в соцсетях:</div>

    <div class="social-list">
        <a class="social" href="https://vk.com/">
            <img src="public/img/vk-64.png" alt="">
            <div class="title"> ВКонтакте</div>
        </a>

        <a class="social" href="https://vk.com/">
            <img src="public/img/ds-64.png" alt="">
            <div class="title">Discord</div>
        </a>

        <a class="social" href="https://vk.com/">
            <img src="public/img/tg-64.png" alt="">
            <div class="title">Telegram</div>
        </a>
    </div>
 </div>

</template>
<script>
    export default {
        mounted() {
        }
    }
</script>
<style scoped> 
main > .lending {
    background: rgb(29 29 29 / 90%);
    outline: 2px solid rgb(110 110 110 / 9%);
    width: 50%;
    min-height: 250px;
    border-radius: 5px;
    padding: 20px;
    display: flex;
    flex-direction: column;
    justify-content: center;
    margin-bottom: 30px;
}
main > .lending > .title {
    font-size: 30px;
    font-weight: 600;
    margin-bottom: 15px;
}
main > .lending > .desc {
 margin-bottom: 30px;   
}
main > .lending > .btn-play {
    padding: 10px;
    max-width: 200px;
    text-align: center;
    background: rgb(65, 255, 59);
    background: rgb(106 106 106 / 12%);
    border-radius: 5px;
    border: 1px solid rgb(122 122 122 / 59%);
    transition: 0.3s;
    cursor:pointer;
}
main > .lending > .btn-play:hover {
    background: rgb(65, 255, 59);
    transform: scale(0.98);
    transition: 0.3s;

}
main >.socials {
    width: 100%;
    min-height: 250px;
    border-radius: 10px;
    padding: 20px;
    background: rgb(29 29 29 / 90%);
    outline: 2px solid rgb(110 110 110 / 9%);
}
main > .socials > .title {
    font-size: 30px;
    font-weight: 600;
    margin-bottom: 30px;
}
main > .socials > .social-list {
    display: flex;
    justify-content: space-between;
}

main > .socials > .social-list > .social{
    width: 300px;
    height: 150px;
    background: rgb(39, 39, 39);
    border-radius: 10px;
    margin: 0px 10px;
    display: flex;
    flex-direction: row;
    flex-wrap: nowrap;
    justify-content: center;
    align-items: center;
    transition: 0.3s;
}
main > .socials > .social-list > .social > img{
    margin-right: 15px;
}
main > .socials > .social-list > .social:hover{
    background: rgb(26, 26, 26);
    outline: 2px solid rgba(141, 141, 141, 0.09);
    border: 0.1em solid rgb(255, 255, 255);
    transform: scale(1.05);
    transition: 0.3s;
}
main > .socials > .social-list > .social > .title{

    font-size: 18px;
    font-weight: 500;
}
</style>