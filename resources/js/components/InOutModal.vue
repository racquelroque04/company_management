<template>
  <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ducimus ea eum, id iure labore nisi obcaecati porro
          repellendus soluta velit! Ducimus eius minima obcaecati pariatur rem similique? Perferendis, quae reiciendis?
        </div>
        <form @submit.prevent="submit">
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary btn-lg btn-block">Clock In</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>
<script>
  export default  {
    data : function () {
      return {
        data : {},
        status : "null"
      }
    },

    methods : {
      submit() {
        alert("TEST")
        axios.post('/api/attendance/1/in?company_id=1')
          .then(response => {
            this.data = response.data
            this.status = data.status
            alert(this.status)
          }).catch(error => {
          if (error.response.status === 422) {
            this.errors = error.response.data.errors || {};
          }
        });
      },
    }
  }
</script>