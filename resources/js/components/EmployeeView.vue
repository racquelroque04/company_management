<template>
  <div class="card">
    <div class="card-header">Employee List</div>
    <div class="card-body">
      <alert v-show="success"></alert>
      <table class="table table-bordered" v-show="!viewEmployee">
        <thead>
        <tr>
          <th scope="col">Employee iD</th>
          <th scope="col">Name</th>
          <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        <tr v-for="user in users.data">
          <th scope="row">{{ user.id }}</th>
          <td>{{ user.name }}</td>
          <td>
            <button @click="viewEmployeeDetails(user.id)">View</button>
          </td>
        </tr>
        </tbody>
      </table>
      <form v-show="viewEmployee" @submit.prevent="submit">
        <div class="form-group" hidden>
          <label for="" class="col-md-4 col-form-label">Employee ID</label>
          <input type="text" class="form-control" v-model="employee.id">
        </div>
        <div class="form-group">
          <label for="" class="col-md-4 col-form-label">Employee Namess</label>
          <input type="text" class="form-control" v-model="employee.name">
        </div>
        <div class="form-group">
          <label for="" class="col-md-4 col-form-label">Employee Email</label>
          <input type="text" class="form-control" name="email" v-model="employee.email">
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-primary">Submit</button>
          <button type="button" @click="viewEmployee = !viewEmployee" class="btn btn-primary" v-show="viewEmployee">Back</button>
        </div>
      </form>
    </div>
  </div>
</template>
<script>
  export default {
    data () {
      return {
        users : [],
        viewEmployee : false,
        employee : [],
        success : false
      }
    },

    created () {
      axios
        .get('/api/employees?company_id=1', this.formFields)
        .then(response =>
          (this.users = response.data)
        )
    },

    mounted () {
      console.log('Component mounted.')
    },

    methods : {
      viewEmployeeDetails ($userId) {
        axios
          .get('/api/employee/' + $userId)
          .then(response => {
            this.employee = response.data.data;
            this.viewEmployee = true
            console.log(this.employee);
            }
          )
      },

      submit() {
        this.errors = {};
        axios.post('/api/employee/' + this.employee.id, this.employee)
          .then(response => {
            this.employee = response.data.data
            console.log(this.employee)
            this.success = true;
          }).catch(error => {
          if (error.response.status === 422) {
            this.errors = error.response.data.errors || {};
          }
        });
      },
    }
  }
</script>
