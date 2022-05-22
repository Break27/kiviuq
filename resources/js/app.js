require('./bootstrap');

import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/inertia-vue3';
import { InertiaProgress } from '@inertiajs/progress';
import OverlayScrollbars from 'overlayscrollbars/js/OverlayScrollbars';

const appName = window.document.getElementsByTagName('title')[0]?.innerText || 'Kiviuq';

createInertiaApp({
    title: (title) => `${title} | ${appName}`,
    resolve: (name) => require(`./Pages/${name}.vue`),
    setup({ el, app, props, plugin }) {
        return createApp({
            render: () => h(app, props),
        })
        .use(plugin)
        .mixin({ methods: { route } })
        .mount(el);
    },
});

document.addEventListener("DOMContentLoaded", () => {
    OverlayScrollbars(document.body, {
        className: 'os-theme-minimal-light',
    });
});

InertiaProgress.init({ color: '#4B5563' });
