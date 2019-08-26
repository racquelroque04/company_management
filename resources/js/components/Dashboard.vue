<template>
  <div class="row">
    <div class="col-md-4">
      <div class="card">
        <div class="card-header">
          Your Company
        </div>
        <div class="card-body">
          <div id="accordion">
            <div class="card">
              <div class="card-header p-1" id="headingOne">
                <button class="btn btn-link w-100 text-left text-decoration-none" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                  Employee
                </button>
              </div>

              <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                <ul class="list-group">
                  <li class="list-group-item" @click="view('employee')">View</li>
                  <li class="list-group-item" @click="create('employee')">Create New</li>
                </ul>
              </div>
            </div>
            <div class="card">
              <div class="card-header p-1" id="headingTwo">
                <h5 class="mb-0">
                  <button class="btn btn-link collapsed w-100 text-left text-decoration-none" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    Department
                  </button>
                </h5>
              </div>
              <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                <ul class="list-group">
                  <li class="list-group-item" @click="view('department')">View</li>
                  <li class="list-group-item" @click="create('department')">Create New</li>
                </ul>
              </div>
            </div>
            <div class="card">
              <div class="card-header p-1" id="headingThree">
                <h5 class="mb-0">
                  <button class="btn btn-link collapsed w-100 text-left text-decoration-none" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    Position
                  </button>
                </h5>
              </div>
              <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                <ul class="list-group">
                  <li class="list-group-item" @click="view('position')">View</li>
                  <li class="list-group-item" @click="create('position')">Create New</li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">Create your Company</div>
        <employee-create v-if="tabSelected == 'employee'"></employee-create>
      </div>
    </div>
  </div>
</template>

<script>
  import Form from './EmployeeForm';
  import Example from './ExampleComponent';

  export default {
    data : function() {
      return {
        fields : [],
        tabSelected : null
      }
    },

    components : {
      Form
    },

    methods : {
      view(item) {
        alert("test " + item)
      },

      create(item) {
        this.tabSelected = item
      }
    }
  }
</script>