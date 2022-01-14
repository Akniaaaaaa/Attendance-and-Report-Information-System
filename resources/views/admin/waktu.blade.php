<template>
  {{ countDown }}
</template>

<script>
   export default {
       data() {
           return {
               countDown : 10
           }
       },
       method: {
           countDownTimer() {
               if(this.countDown > 0) {
                   setTimeout(() => {
                       this.countDown -= 1
                       this.countDownTimer()
                   }, 1000)
               }
           }
       }
       created: {
          this.countDownTimer()
       }
   }
</script>
