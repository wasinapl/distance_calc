<template>
  <Distance/>
</template>

<script>
import Distance from './components/Distance.vue'

export default {
  name: 'App',
  components: {
    Distance
  }
}
</script>

<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  margin-top: 60px;
  display: flex;
  justify-content: center;
  flex-direction: row;
}

html,body {
  background-color: #202020;
  color: white;
}
</style>
