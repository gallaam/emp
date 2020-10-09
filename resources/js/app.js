/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import VueRouter from 'vue-router';




window.Vue.use(VueRouter);

import Employees from './components/Employees.vue';
import EmployeesCreate from './components/EmployeesCreate.vue';
import EmployeesEdit from './components/EmployeesEdit.vue';
import EmployeesChart from './components/EmployeesChart.vue';


const routes = [
 {
    path: '/',
    components: {
        Employees: Employees
    }  
 },
{path: '/create', component: EmployeesCreate, name: 'EmployeesCreate'},
 {path: '/edit/:id', component: EmployeesEdit, name: 'EmployeesEdit'},
 {path: '/chart', component: EmployeesChart, name: 'EmployeesChart'},
]
 
const router = new VueRouter({ routes })
 
const app = new Vue({ router }).$mount('#emp')

