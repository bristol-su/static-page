import Vue from 'vue';
import AWN from "awesome-notifications";
import Toolkit from '@bristol-su/frontend-toolkit';
import ShowHtml from './components/participant/ShowHtml';
import ButtonClicks from './components/admin/ButtonClicks';
import PageViews from './components/admin/PageViews';

Vue.prototype.$notify = new AWN({position: 'top-right'});
Vue.use(Toolkit);

let vue = new Vue({
    el: '#static-page-root',

    components: {
        ShowHtml,
        ButtonClicks,
        PageViews
    }
});
