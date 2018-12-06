<template>
  <div>
     <h2>Current count is : {{count}} </h2>
     <button @click="count += 1">Incement</button>
  </div>
</template>

<script>
export default {
  data() {
  		return {
  			count : 0
  		}
  }
  
}
</script>

<style>

</style>
