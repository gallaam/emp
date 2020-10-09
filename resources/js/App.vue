<template>
	<div id="app">
		<ul class="list-unstyled">
			<employee-component v-for="employee in employees" v-bind="employee" :key="employee.id" @delete="del"></employee-component>
		</ul>
	</div>
</template>
<script>
  function Employee({ id, city, name}) {
    this.id = id;
    this.city = city;
    this.name = name;
  }
  import EmployeeComponent from './components/EmployeeComponent.vue';
  export default {
    data() {
      return {
        employees: []
      }
    },
    methods: {
      async create() {
        // To do
      },
      async read() {
		axios.get('api/employees').then(response => {
            this.employees = response.data
			
          })
		

      },
      async update(id, city, name) {
        // To do
      },
      async del(id) {
        // To do
      }
    },
    components: {
      EmployeeComponent
    },
	created() {
      this.read();
    }
  }
</script>
