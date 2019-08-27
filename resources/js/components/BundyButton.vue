<template>
  <button type="button" v-bind:class="{'btn-primary' : type == 'IN', 'btn-danger' : type == 'OUT',}" class="btn btn-lg btn-block" data-toggle="modal" data-target=".bd-example-modal-lg">
    CLOCK {{ type }}
  </button>
</template>

<script>
  export default {
    data () {
      return {
        type : null
      }
    },

    mounted () {
      this.type = 'IN'
      this.$root.$on('clockedType', (type) => {
        this.type = type
      })
    }
  }
</script>