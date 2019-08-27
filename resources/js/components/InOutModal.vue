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
          <input type="hidden" name="clocked-type" v-model="fields.type">
          <div class="modal-footer">
            <button type="submit" v-bind:class="{'btn-primary' : fields.type == 'IN', 'btn-danger' : fields.type == 'OUT',}" class="btn btn-lg btn-block">
              CLOCK {{ fields.type }}
            </button>
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
        attendance : {},
        fields : {
          type : ""
        },
        data : {},
        status : null,
      }
    },
    mounted() {
      axios
        .get('/api/attendance/1?company_id=1')
        .then(response => {
          this.attendance = response.data
          this.fields.type = this.attendance.data.type === "IN" ? "OUT" : "IN"
          this.$root.$emit('clockedType', this.fields.type)
          this.$root.$emit('clockedStatus', this.attendance.data.type)
        }
        )
    },

    methods : {
      submit() {
        axios.post('/api/attendance/1?company_id=1', this.fields)
          .then(response => {
            this.data = response.data
            this.status = this.data.data.type
            this.fields.type = this.status === "IN" ? "OUT" : "IN"
            this.$root.$emit('clockedStatus', this.status)
            this.$root.$emit('clockedType', this.fields.type)
          });
      },
    }
  }
</script>