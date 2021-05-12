// Import modules...
import VueMeta from "vue-meta";
import {createApp, h} from 'vue';
import {App as InertiaApp, plugin as InertiaPlugin} from '@inertiajs/inertia-vue3';
import {InertiaProgress} from '@inertiajs/progress';

require('./bootstrap');

const el = document.getElementById('app');

createApp({
    metaInfo: {
        titleTemplate: (title) => title ? `${title} - Admin Portal - ${process.env.APP_NAME}` : `Admin Portal - ${process.env.APP_NAME}`
    },
    render: () =>
        h(InertiaApp, {
            initialPage: JSON.parse(el.dataset.page),
            resolveComponent: (name) => require(`./Admin/Pages/${name}`).default,
        }),
})
    .mixin({methods: {route}})
    .use(InertiaPlugin)
    // .use(VueMeta)
    .mount(el);

InertiaProgress.init({color: '#4B5563'});
