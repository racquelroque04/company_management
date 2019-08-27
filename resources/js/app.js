/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import moment from 'moment';
Vue.prototype.moment = moment


/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('dashboard', require('./components/Dashboard.vue').default);
Vue.component('employee-create', require('./components/EmployeeForm.vue').default);
Vue.component('employee-view', require('./components/EmployeeView.vue').default);
Vue.component('department-create', require('./components/DepartmentForm.vue').default);
Vue.component('alert', require('./components/Alert.vue').default);
Vue.component('clock', require('./components/Clock.vue').default);
Vue.component('clocked-in', require('./components/ClockedIn.vue').default);
Vue.component('clocked-status', require('./components/ClockedOut.vue').default);
Vue.component('bundy-button', require('./components/BundyButton.vue').default);
Vue.component('in-out', require('./components/InOutModal.vue').default);
Vue.component('duration-timer', require('./components/DurationTimer.vue').default);
Vue.component('attendances', require('./components/Attendances.vue').default);

//Employee


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
});
