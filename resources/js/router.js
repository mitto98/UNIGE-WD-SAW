import Index from "./pages/Index";

export default {
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'index',
            component: Index
        },
        // {
        //     path: '/hello',
        //     name: 'hello',
        //     component: Hello,
        // },
    ],
}
