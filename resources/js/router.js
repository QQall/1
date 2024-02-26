import { createRouter, createWebHistory} from "vue-router";





/******** USER ROOTES  START ********/
import Home from './users/pages/Home.vue';
import Cabinet from './users/pages/Cabinet.vue';
import About from './users/pages/About.vue';
import Servers from './users/pages/Servers.vue';
/******** USER ROOTES  END ********/





/******** ADMIN ROOTES START ********/
import IndexAdmin from './admin/Index.vue';

/* servers block */
import admin_servers_index from './admin/pages/servers/index.vue';

/* history block */
import admin_history_index from './admin/pages/history/index.vue';

/* users block */
import admin_users_index from './admin/pages/users/index.vue';

/* product block */
import admin_product_index from './admin/pages/product/index.vue';

/* setting block */
import admin_setting_index from './admin/pages/setting/index.vue';


/******** ADMIN ROOTES END ********/





/* router links */
const routes = [

    /* USER ROOTES */
    {
        path: '/',
        component: Home
    },
    {
        path: '/cabinet',
        component: Cabinet
    },
    {
        path: '/about',
        component: About
    },
    {
        path: '/servers',
        component: Servers
    },
    /* ADMIN ROOTES */
    {
        path: '/admin/',
        component: IndexAdmin,
        meta:{
            layout: "admin-layout",
            title: "Главная страница"
        }
    },
    {
        path: '/admin/servers',
        component: admin_servers_index,
        meta:{
            layout: "admin-layout"
        }
    },
    {
        path: '/admin/product',
        component: admin_product_index,
        meta:{
            layout: "admin-layout"
        }
    },
    {
        path: '/admin/users',
        component: admin_users_index,
        meta:{
            layout: "admin-layout"
        }
    },
    {
        path: '/admin/history',
        component: admin_history_index,
        meta:{
            layout: "admin-layout"
        }
    },
    {
        path: '/admin/setting',
        component: admin_setting_index,
        meta:{
            layout: "admin-layout"
        }
    },
]


const router = createRouter ({
    history: createWebHistory(),
    routes
});

export default router;


/* router guard */
router.beforeEach((to, from, next) => {
    const protectedRoutes = ['/admin/'];
    if (protectedRoutes.includes(to.path)) {
        /* Условие проверки ролей */
        alert ("Ссылка доступна админу!")
        console.log ("Ссылка доступна админу!")

    }else {
        /* Вернём обычную ссылку */
        console.log ("Ссылка доступна всем!")
        return  next();
    }
});

