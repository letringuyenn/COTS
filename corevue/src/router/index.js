import { createRouter, createWebHistory } from "vue-router"; // cài vue-router: npm install vue-router@next --save

const routes = [
  {
    path: "/",
    component: () => import("../components/Client/Dashboard/index.vue"),
  },
  {
    path: "/dashboard",
    component: () => import("../components/Client/Dashboard/index.vue"),
    meta: { layout: "default" },
  },
  {
    path: "/project",
    component: () => import("../components/Client/Project/index.vue"),
    meta: { layout: "default" },
  },
  {
    path: "/dang-nhap",
    component: () => import("../components/DangNhap/index.vue"),
    meta: { layout: "blank-layout" },
  },
];

const router = createRouter({
  history: createWebHistory(),
  routes: routes,
});

export default router;
