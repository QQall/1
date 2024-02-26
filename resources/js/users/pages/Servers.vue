<template>
<div class="server-list">
    <div class="server" v-for="server in servers" :key="server.id">
        <div class="title">{{server.name}}</div>
        <div class="online">10/100</div>
        <div class="btn-ip-copy">{{server.ip}}</div>
    </div>
</div>
</template>

<script>
    export default {
        data () {
            return {
                servers: null,
            }
        },
        mounted() {
            this.getServer();
        },
        methods: {
            getServer(){
                axios.get('/api/server-list')
                .then (res => {
                    this.servers = res.data;
                    console.log (res);
                })
                .catch  (err => {
                    console.log (err);
                })
            }
        }
    }
</script>
<style scoped>
.server-list  {
    width: 100%;
    padding: 0px 20px;
    display: flex;
    flex-direction: row;
    justify-content: center;
    flex-wrap: wrap;
    align-items: center;
}
.server-list > .server{
    background: rgb(29 29 29 / 90%);
    outline: 1px solid rgb(88 88 88 / 16%);
    box-shadow: 0 1px rgb(116 116 116 / 27%);
    width: 200px;
    min-height: 250px;
    border-radius: 5px;
    margin: 0px 20px;
    padding: 10px;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: space-around;
    margin-bottom: 20px;
}
.server-list > .server > .title {
    font-size: 20px;
    text-align: center;
    font-weight: 500;
}
.server-list > .server > .btn-ip-copy {
    padding: 10px;
    background: rgb(106 106 106 / 12%);
    border-radius: 5px;
    border: 1px solid rgb(122 122 122 / 59%);
    cursor: pointer;
}
.server-list > .server > .btn-ip-copy:hover {
    background: rgba(58, 58, 58, 0.12);
    border-radius: 5px;
    border: 1px solid rgb(122 122 122 / 59%);
    transform: scale(0.95);
    transition: 0.3s
}
</style>