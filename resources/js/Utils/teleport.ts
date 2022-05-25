import { render, createVNode, VNode } from 'vue';

const inboundEvent = new CustomEvent('notify', {detail: {'arrival': true}});
const outboundEvent = new CustomEvent('notify', {detail: {'arrival': false}});

export class Teleport {
    container: HTMLElement;
    vnode: VNode;
    target: HTMLElement | null;

    constructor(component, props = {}) {
        this.container = document.createElement('div');
        this.vnode = createVNode('div', props, component);
        this.target = null;
    }

    /**
     * Notify the target portal.
     *
     * @param arrival
     */
    notify(arrival) {
        this.target?.dispatchEvent(arrival ? inboundEvent : outboundEvent);
    }

    /**
     * Change destination to the specific portal.
     *
     * @param portal
     */
    changeTo(portal) {
        this.target = document.getElementById(portal.startsWith('#')
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
    teleport(portal = null, force = false) {
        if(!this.target || force) this.changeTo(portal);

        this.notify(true);
        render(this.vnode, this.container);
        this.target?.appendChild(this.container.firstElementChild!);
    }

    /**
     * Remove the previously teleported node.
     *
     * @param timeout
     */
    revoke(timeout = 0) {
        this.notify(false);
        setTimeout(() => {
            render(null, this.container);
        }, timeout);
    }
}
