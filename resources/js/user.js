// Import modules...
import VueMeta from "vue-meta";
import {createApp, h} from 'vue';
import {App as InertiaApp, plugin as InertiaPlugin} from '@inertiajs/inertia-vue3';
import {InertiaProgress} from '@inertiajs/progress';

require('./bootstrap');

const el = document.getElementById('app');

createApp({
    render: () =>
        h(InertiaApp, {
            initialPage: JSON.parse(el.dataset.page),
            resolveComponent: (name) => require(`./User/Pages/${name}`).default,
        }),
})
    .mixin({ methods: { route } })
    .use(InertiaPlugin)
    .use(VueMeta, {
        metaInfo: {
            titleTemplate: (title) => title ? `${title} - ${process.env.APP_NAME}` : `${process.env.APP_NAME}`
        }
    })
    .mount(el);

InertiaProgress.init({ color: '#4B5563' });
