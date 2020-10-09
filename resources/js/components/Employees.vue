<template>
	<div>
	<div class="form-group">
		<router-link :to="{name: 'EmployeesCreate'}" class="btn btn-success">Create new employee</router-link>
		<router-link :to="{name: 'EmployeesChart'}" class="btn btn-info">Chart Salary</router-link>
	</div>	
		
		<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Phone</th>
      <th scope="col">City</th>
	  <th scope="col">Actions</th>
    </tr>
  </thead>
  <tbody>
    <tr v-for="employee, index in employees">
      <th scope="row">{{ employee.id }}</th>
      <td>{{ employee.name | properCase }}</td>
      <td>{{ employee.phone }}</td>
      <td>{{ employee.city }}</td>
	  <td><router-link :to="{name: 'EmployeesEdit', params: {id: employee.id}}" class="btn btn-success btn-sm">Edit</router-link>
					<button type="button" class="btn btn-danger btn-sm" v-on:click="deleteEmployee(employee.id, index)">Delete</button>
		</td>
    </tr>

  </tbody>
</table>
</div>
</template>
<script>
 export default {
	data: function () {
		return {
		  employees: []
		}
	},
	mounted() {
		var app = this;
		axios.get('/api/employees')
		.then(function (resp) {
			app.employees = resp.data;
		})
		.catch(function (resp) {
			console.log(resp);
			alert("No data");
		});
	},
	methods: {
	deleteEmployee(id, index) {
		if (confirm("Confirm delete this employee?")) {
			var app = this;
			axios.delete('/api/employees/' + id)
			.then(function (resp) {
				app.employees.splice(index, 1);
			})
			.catch(function (resp) {
				alert("Failed to delete");
			});
		}
	}
	},
	filters: {
		properCase(string) {
			return string.charAt(0).toUpperCase() + string.slice(1);
		}
    }
}
</script>

