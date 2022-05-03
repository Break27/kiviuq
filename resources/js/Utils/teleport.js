import { render, createVNode } from 'vue';

export const createTeleport = function (component, props = {}) {
    const container = document.createElement('div');
    const vnode = createVNode('div', props, component);

    const teleport = (portal) => {
        const target = portal.startsWith('#')
            ? document.getElementById(portal.substring(1))
            : document.getElementsByTagName(portal).item(0)

        render(vnode, container);
        target.appendChild(container.firstElementChild);
    }

    const revoke = () => {
        render(null, container);
    }

    return { teleport, revoke };
};
