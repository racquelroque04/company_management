<template>
  <div class="text-center">
    <div class="currentTime h2">
      {{ (moment().format('h:mm a')) }}
    </div>
    <div class="currentDate">{{ (moment().format('MMMM D, YYYY dddd')) }}</div>
  </div>
</template>