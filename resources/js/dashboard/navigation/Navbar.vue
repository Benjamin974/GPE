<template>
  <nav class="pb-12" flat height="10px" tile>
    <v-toolbar extended extension-height="10" color="brown">
      <v-app-bar-nav-icon @click="drawer = !drawer"></v-app-bar-nav-icon>
      <v-toolbar-title>G P E</v-toolbar-title>

      <v-spacer></v-spacer>

      <v-btn v-if="!isChecked" v-on:click="show" class="mr-4" to="/login"><v-icon class="mr-1">mdi-login</v-icon>Login</v-btn>

      <v-btn v-if="isChecked" @click="logout" class="nav-item nav-link"><v-icon class="mr-1">mdi-logout</v-icon>Logout</v-btn>
    </v-toolbar>

    <v-navigation-drawer app v-model="drawer" color="brown lighten-1">
      <v-btn
          icon
          @click.stop="drawer = !drawer"
        >
          <v-icon>mdi-chevron-left</v-icon>
        </v-btn>
      <v-list>
        <v-list-item>
          <v-list-item-action>
            <v-icon class="white--text">mdi-equal-box</v-icon>
          </v-list-item-action>
          <v-list-item-content>
            <v-list-item-title class="white--text">
              <v-btn class="mr-4" to="/">Accueil</v-btn>
            </v-list-item-title>
          </v-list-item-content>
        </v-list-item>
        <v-list-item v-if="isCoach">
          <v-list-item-action>
            <v-icon class="white--text">mdi-account-star</v-icon>
          </v-list-item-action>
          <v-list-item-content>
            <v-list-item-title class="white--text">
              <v-btn class="mr-4" :to="'/coach/programmes/' + currentUser.id"> Programmes</v-btn>
            </v-list-item-title>
          </v-list-item-content>
        </v-list-item>
        <v-list-item v-if="isClient">
          <v-list-item-action>
            <v-icon class="white--text">mdi-account</v-icon>
          </v-list-item-action>
          <v-list-item-content>
            <v-list-item-title class="white--text">
              <v-btn class="mr-4" to="/client/programmes">Programmes</v-btn>
            </v-list-item-title>
          </v-list-item-content>
        </v-list-item>
      </v-list>
    </v-navigation-drawer>
  </nav>
</template>

<script>
import { authenticationService } from "../_services/authentication.service";
import { Role } from "../_helpers/role";
import router from "../routes";
import Axios from 'axios';

export default {
  data() {
    return {
      isDisplay: false,
      currentUser: null,
      drawer: false,
      users: []
    };
  },

  computed: {
    isChecked() {
      return this.currentUser;
    },

    isClient() {
      if (!_.isEmpty(this.currentUser)) {
        return this.currentUser.role.name == "client";
      }
    },

    isCoach() {
      if (!_.isEmpty(this.currentUser)) {
        return this.currentUser.role.name == "coach";
      }
    },

    isGerant() {
      if (!_.isEmpty(this.currentUser)) {
        return this.currentUser.role.name == "gerant";
      }
    }
  },

  methods: {

    logout() {
      authenticationService.logout();
      router.push("/login");
    },
    show: function() {
      this.isDisplay = true;
    },
    hide: function() {
      this.isDisplay = false;
    },
  },

    created() {
    authenticationService.currentUser.subscribe(x => (this.currentUser = x));
  },
};
</script>
