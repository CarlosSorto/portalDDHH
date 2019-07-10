require('./bootstrap');
window.Pikaday = require('pikaday');
require('pikaday/css/pikaday.css');
require('owl.carousel');
require('jquery-validation');
require('jquery-validation/dist/localization/messages_es.js')
window.GMaps = require('gmaps');
require('./jquery-jvectormap-2.0.3.min.js');
require('./jquery-jvectormap-world-mill.js');

window.Vue = require('vue');
window.vueFilter = require('vue-filter');
window.vuePaginate = require('vuejs-paginate');

Vue.use(vueFilter);
Vue.component('paginate', vuePaginate);

Vue.component('documents', require('./components/Documents.vue'));
Vue.component('formations', require('./components/Formations.vue'));
Vue.component('organizations', require('./components/Organizations.vue'));
Vue.component('gmap', require('./components/Gmap.vue'));

new Vue({
    el: '#app',
    data() {
        return {
            latitude: null,
            longitude: null,
        }
    },
    mounted() {
        this.latitude = document.getElementById("latitude");
        this.longitude = document.getElementById("longitude");
    },
    methods: {
      updateInputs: function(e){
        var coordinates = e.position.latLng;
        this.latitude.value = coordinates.lat();
        this.longitude.value = coordinates.lng();
      }
    }
});
require('chosen-js');
require('chosen-js/chosen.css');
require('./site');
