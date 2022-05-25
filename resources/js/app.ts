const OverlayScrollbars = require('overlayscrollbars');
const route = require('ziggy-js');

import { createApp, h } from 'vue';
import { createInertiaApp } from '@inertiajs/inertia-vue3';
import { InertiaProgress } from '@inertiajs/progress';

const appName = window.document.getElementsByTagName('title')[0]?.innerText || 'Kiviuq';

createInertiaApp({
    title: (title) => `${title} | ${appName}`,
    resolve: (name) => require(`./Pages/${name}.vue`),
    setup({ el, app, props, plugin }) {
        const instance = createApp({
            render: () => h(app, props)
        });
        instance.config.globalProperties.$route = route;
        instance.use(plugin).mount(el);
        return instance;
    },
});

document.addEventListener("DOMContentLoaded", () => {
    OverlayScrollbars(document.body, {
        className: 'os-theme-minimal-light',
    });
});

InertiaProgress.init({ color: '#4B5563' });
