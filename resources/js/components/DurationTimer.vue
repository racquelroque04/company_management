<template>
  <div class="text-center">
    <div class="h5 p-3">
      <span v-if="!isClockedIn">--</span>
      <span v-if="isClockedIn">{{ currentHours }} hours {{ currentMinutes }} minutes</span>
    </div>
  </div>
</template>

<script>
  import moment from 'moment';
  Vue.prototype.moment = moment

  export default {
    data () {
      return {
        currentHours : '0',
        currentMinutes : '00',
        currentSeconds : '00',
        currentDurationMoment : 0,
        isClockedIn : false,
        createdAt : null
      }
    },

    mounted () {
      setInterval(this.setTimers, 1000)
      this.$root.$on('isClockedIn', (type, created) => {
        this.createdAt = created
        this.isClockedIn = type == "IN" ? true : false
        if (type === "OUT") {
          this.currentHours = "0"
          this.currentMinutes = "00"
          this.currentSeconds = "00"
        }
      })
    },

    methods : {
      setTimers () {
        this.setCurrentTimer()
      },

      setCurrentTimer () {
        let attendanceCreatedAtString = this.createdAt
        let attendanceCreatedAt = moment.utc(attendanceCreatedAtString, 'YYYY-MM-DD HH:mm:ss')
        this.currentDurationMs = moment.duration(moment().diff(attendanceCreatedAt))

        let currentDurationMoment = moment('2019-08-27').startOf('day').millisecond(this.currentDurationMs)
        this.currentSeconds = currentDurationMoment.format('ss')
        this.currentMinutes = currentDurationMoment.format('mm')
        this.currentHours = currentDurationMoment.format('H')
      }
    }
  }
</script>