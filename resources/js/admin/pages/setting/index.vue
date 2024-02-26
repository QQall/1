<template>
    <div>
    <button @click="redirectToSteam">Войти через Steam</button>
    <p v-if="steamId">Steam ID авторизованного пользователя: {{ steamId }}</p>
    <p v-else>Загрузка...</p>
    </div>
  </template>
  
  <script>
  export default {
    data() {
        return {
            steamId: null
        };
    },

    mounted() {
    this.fetchUserData();
    },

    methods: {

        //открываем url авторизации в steam
        redirectToSteam() {
            window.location.href = "/auth/steam";
        },

        //получаем пользователя.
        fetchUserData() {
            axios.get('/api/user')
                .then(response => {
                    this.steamId = response.data.steam_id;
                })
                .catch(error => {
                    console.error('Ошибка при получении данных пользователя:', error);
                });
        }
    },
}
  </script>
  