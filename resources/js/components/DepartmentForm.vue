<template>
  <div class="card">
    <div class="card-header">Create new Department</div>
    <div class="card-body">
      <form @submit.prevent="submit">
        <div class="form-group" v-for="field in fields">
          <label for="" class="col-md-4 col-form-label">{{ field.label }}</label>
          <input type="text" :name="field.name" class="form-control" v-model="formFields[field.name]">
        </div>
        <div class="form-group">
          <label for="" class="col-md-4 col-form-label">Position</label>
          <select name="employee_position" id="" class="form-control" v-model="formFields['employee_position']">
            <option v-for="position in positions.data" :id="position.id" :value="position.id">
              {{ position.name }}
            </option>
          </select>
        </div>
        <div class="form-group">
          <button type="submit" class="btn btn-primary">Submit</button>
        </div>
      </form>
    </div>
  </div>
</template>
<script>
  export default {
    data () {
      return {
        fields : [
          {'name' : 'employee_name', 'label' : "Employee Name"},
          {'name' : 'employee_email', 'label' : "Employee Email"},
          {'name' : 'employee_password', 'label' : "Employee Password"},
          {'name' : 'employee_birthday', 'label' : "Employee Birthday"},
        ],
        positions : [],
        formFields : {}
      }
    },

    created () {
      axios
        .get('https://next-proj.test/api/positions?company_id=1', this.formFields)
        .then(response =>
          (this.positions = response.data)
        )
    },

    mounted () {
      console.log('Component mounted.')
    },

    methods : {
      submit() {
        console.log(this.formFields)
        this.errors = {};
        axios.post('/api/employee?company_id=1', this.formFields)
          .then(response => {
            this.formFields = {};
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