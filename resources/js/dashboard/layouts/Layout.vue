<template >
  <v-app>
    <link
      href="https://cdn.jsdelivr.net/npm/@mdi/font@4.x/css/materialdesignicons.min.css"
      rel="stylesheet"
    />
    <div class="nav">
        <navbar></navbar>
    </div>

    <v-content>
      <v-container fluid>
        <router-view></router-view>
      </v-container>
    </v-content>
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

<style>
.test {
  background-color: '#9FA8D';
}
</style>