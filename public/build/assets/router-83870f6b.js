import{c as e,a as o,H as n,C as m,A as s,S as i,I as r,b as d,d as p,e as c,f as u,g as l}from"./index-38b98093.js";import"./index-409b0ab6.js";const y=[{path:"/",component:n},{path:"/cabinet",component:m},{path:"/about",component:s},{path:"/servers",component:i},{path:"/admin/",component:r,meta:{layout:"admin-layout",title:"Главная страница"}},{path:"/admin/servers",component:d,meta:{layout:"admin-layout"}},{path:"/admin/product",component:p,meta:{layout:"admin-layout"}},{path:"/admin/users",component:c,meta:{layout:"admin-layout"}},{path:"/admin/history",component:u,meta:{layout:"admin-layout"}},{path:"/admin/setting",component:l,meta:{layout:"admin-layout"}}],h=e({history:o(),routes:y});h.beforeEach((t,_,a)=>{if(["/admin/"].includes(t.path))alert("Ссылка доступна админу!"),console.log("Ссылка доступна админу!");else return console.log("Ссылка доступна всем!"),a()});
