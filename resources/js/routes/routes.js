export default [
    {
        path: "/",
        redirect: "/auth",
    },
    {
        path: "/auth",
        component: () => import("../layout/auth/AuthLayout.vue"),
        children: [
            {
                name: 'Login',
                path: "",
                component: () => import("../modules/auth/LoginPage.vue"),
            },
        ],
    },
    {
        path: "/panel",
        component: () => import("../layout/panel/PanelLayout.vue"),
        children: [
            {
                name: 'GiftCard',
                path: "gift-card",
                component: () => import("../modules/gift-card/GiftCardPage.vue"),
            }
        ],
        redirect: "/panel/gift-card",
    },
    {
        path: "/error",
        component: () => import("../layout/auth/AuthLayout.vue"),
        children: [
            {
                name: '404',
                path: "404",
                component: () => import("../modules/error/404.vue"),
            },
            {
                name: '403',
                path: "403",
                component: () => import("../modules/error/403.vue"),
            }
        ],
    },
    {
        path: "/:catchAll(.*)",
        redirect: { name: "404" },
    },
];
