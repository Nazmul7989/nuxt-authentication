<template>
  <div class="wrapper">
    <Sidebar/>

    <div class="main">

      <Header/>

      <main class="content">
        <Nuxt/>
      </main>

      <Footer/>

    </div>
  </div>

</template>

<script>
import Sidebar from "~/components/layouts/Sidebar";
import Header from "~/components/layouts/Header";
import Footer from "~/components/layouts/Footer";
export default {
name: "default",
  components: {Footer, Header, Sidebar}
}
</script>

<style scoped>

</style>
