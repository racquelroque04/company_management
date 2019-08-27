<template>
  <div class="row">
    <ul class="list-group w-100">
      <li class="list-group-item">
        <div class="row">
          <div class="col-4 font-weight-bold">Date</div>
          <div class="col-4 font-weight-bold">Type</div>
          <div class="col-4 font-weight-bold">Duration</div>
        </div>
      </li>
    </ul>
    <ul class="list-group w-100" v-for="attendance in attendances.data">
      <li class="list-group-item">
        <div class="row">
          <div class="col-4">{{ moment(attendance.created_at).format("LL") }}</div>
          <div class="col-4">CLOCKED {{ attendance.type }}</div>
          <div class="col-4">
            {{ Math.floor(moment.duration(attendance.duration, 'milliseconds').asHours()) }}
          </div>
        </div>
      </li>
    </ul>
  </div>
</template>

<script>
  export default {
    data () {
      return {
        attendances : {},
        currentHours : '0',
        currentMinutes : '00',
      }
    },

    mounted () {
      axios.
      get('api/my-attendances/1')
        .then(response => {
          this.attendances = response.data
        })
    }
  }
</script>