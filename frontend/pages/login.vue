<template>
  <Login/>
</template>

<script>
import Login from "~/components/auth/Login";
export default {
  name: "login",
  auth: 'guest',
  layout: 'master',
  components: {Login}
}
</script>

<style scoped>

</style>
