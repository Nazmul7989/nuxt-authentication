<template>
<Register/>
</template>

<script>
import Register from "~/components/auth/Register";
export default {
  name: "register",
  auth: 'guest',
  layout: 'master',
  components: {Register}
}
</script>

<style scoped>

</style>
