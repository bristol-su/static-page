import Vue from 'vue';
import BootstrapVue from 'bootstrap-vue';
import http from '@bristol-su/http-client';
import AWN from "awesome-notifications";

import ShowHtml from './components/participant/ShowHtml';
import Admin from './components/admin/Admin';

Vue.prototype.$http = http;
Vue.prototype.$notify = new AWN({position: 'top-right'});
Vue.use(BootstrapVue);

let vue = new Vue({
    el: '#static-page-root',

    components: {
        ShowHtml,
        Admin
    }
});
