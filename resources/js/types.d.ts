import axios from 'axios';
import route from 'ziggy-js';

declare module "@vue/runtime-core" {
    export interface ComponentCustomProperties {
        $route: typeof route;
        $axios: typeof axios;
    }
}
