import { render, createVNode } from 'vue';

const inboundEvent = new CustomEvent('notify', {detail: {'arrival': true}});
const outboundEvent = new CustomEvent('notify', {detail: {'arrival': false}});

export const createTeleport = function (component, props = {}) {
    const container = document.createElement('div');
    const vnode = createVNode('div', props, component);
    let target = null;

    /**
     * Notify the target portal.
     *
     * @param arrival
     */
    const notify = (arrival) => {
        target?.dispatchEvent(arrival ? inboundEvent : outboundEvent);
    }

    /**
     * Change destination to the specific portal.
     *
     * @param portal
     */
    const changeTo = (portal) => {
        target = document.getElementById(portal.startsWith('#')
            ? portal.substring(1)
            : portal
        );
    }

    /**
     * Teleport node to target portal.
     * Note: the parameter 'portal' only sets an initial value for the destination.
     * Unless parameter 'force' is set as truthy, it would not assign new values once the target is set.
     *
     * @param portal The destination of teleporting.
     * @param force Force teleporting.
     */
    const teleport = (portal = null, force = false) => {
        if(!target || force) changeTo(portal);

        notify(true);
        render(vnode, container);
        target?.appendChild(container.firstElementChild);
    }

    /**
     * Remove the previously teleported node.
     *
     * @param timeout
     */
    const revoke = (timeout = 0) => {
        notify(false);
        setTimeout(() => {
            render(null, container);
        }, timeout);
    }

    return { teleport, revoke, changeTo, vnode };
};
