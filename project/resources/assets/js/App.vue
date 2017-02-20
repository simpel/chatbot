<template>
  <div id="skeleton">
    <Dialogue></Dialogue>
    <UserInput></UserInput>
  </div>
</template>

<script>

import Dialogue from './components/Dialogue.vue'
import UserInput from './components/UserInput.vue'

export default {
  components: {
    Dialogue,
    UserInput
  }
 
}
</script>