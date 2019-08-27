<template>
  <div v-if="status === 'OUT'" class="alert alert-danger" role="alert">
    You are currently clocked out
  </div>
  <div v-else-if="status === 'IN'" class="alert alert-success" role="alert">
    You are currently clocked in
  </div>
</template>
<script>
  export default {
    data : function () {
      return {
        status : null
      }
    },

    mounted() {
      this.status = 'OUT'
      this.$root.$on('clockedStatus', (status) => {
        this.status = status
      })
    }
  }
</script>