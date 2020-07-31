<template>
  <v-app>
    <link
      href="https://cdn.jsdelivr.net/npm/@mdi/font@4.x/css/materialdesignicons.min.css"
      rel="stylesheet"
    />
    <div class="nav">
      <navbar></navbar>
    </div>

    <v-main>
      <v-container fluid>
        <router-view></router-view>
      </v-container>
    </v-main>
    <Footer />
  </v-app>
</template>


<script>
import Navbar from "../navigation/Navbar";
import Footer from "../navigation/Footer";
export default {
  components: {
    Navbar,
    Footer: Footer
  }
};
</script>
