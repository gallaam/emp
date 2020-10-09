<template>
	<div>
		<div class="form-group">
		   <router-link to="/" class="btn btn-info">Back</router-link>
		</div>
		<form v-on:submit="saveForm()">
		  <div class="form-row">
			<div class="col-md-6 mb-3">
				<label class="control-label">Name</label>
				<input type="text" v-model="employee.name" class="form-control" required>
			</div>
			<div class="col-md-6 mb-3">
				<label class="control-label">City</label>
				<input type="text" v-model="employee.city" class="form-control" required>
			</div>
		  </div>
		  <div class="form-row">
			<div class="col-md-6 mb-3">
				<label class="control-label">Salary/month</label>
				<input type="text" v-model="employee.salary" class="form-control" required>
			</div>
			<div class="col-md-3 mb-3">
				<label class="control-label">Email</label>
				<input type="email" v-model="employee.email" class="form-control" required>
			</div>
			<div class="col-md-3 mb-3">
				<label class="control-label">Phone</label>
				<input type="text" v-model="employee.phone" class="form-control" required>

			</div>
		  </div>

		  <button class="btn btn-success">Create</button>
		</form>
	</div>
</template>
<script>
 export default {
    mounted() {
       let app = this;
       let id = app.$route.params.id;
       app.employeeId = id;
       axios.get('/api/employees/' + id)
         .then(function (resp) {
             app.employee = resp.data;
          })
         .catch(function () {
             alert("Failed to load")
          });
    },
    data: function () {
        return {
			employeeId: null,
			employee: {
			  name: '',
			  phone: '',
			  email: '',
			  city: '',
			  salary: '',
          }
       }
    },
    methods: {
       saveForm() {
          event.preventDefault();
          var app = this;
          var newEmployee = app.employee;
          axios.patch('/api/employees/' + app.employeeId, newEmployee)
              .then(function (resp) {
                   app.$router.replace('/');
              })
              .catch(function (resp) {
                    console.log(resp);
                    alert("Failed to create");
               });
        }
     }
 }
</script>