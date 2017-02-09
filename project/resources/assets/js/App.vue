<template>
  <div id="skeleton">
    <MainNavigation></MainNavigation>
    <Dialogue></Dialogue>
    <UserInput></UserInput>
  </div>
</template>

<script>

import Dialogue from './components/Dialogue.vue'
import MainNavigation from './components/MainNavigation.vue'
import UserInput from './components/UserInput.vue'

export default {
  components: {
    MainNavigation,
    Dialogue,
    UserInput
  }
 
}
</script>