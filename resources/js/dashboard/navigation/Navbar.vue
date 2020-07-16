<template>
  <nav class="pb-1" flat height="10px" tile>
    <v-toolbar extended extension-height="10" dark color="#3B444B">
      <v-app-bar-nav-icon class="hidden-md-and-up" @click="drawer = !drawer" color="#FFD600"></v-app-bar-nav-icon>
      <v-toolbar-title>
        <v-icon color="#FFD600" class="hidden-sm-and-down">mdi-dumbbell</v-icon>
        <span style="color:#FFD600">G P E</span>
      </v-toolbar-title>

      <v-spacer></v-spacer>

      <v-btn color="#FFD600" class="mr-4 hidden-sm-and-down" to="/" text>
        <v-icon class="mr-1">mdi-equal-box</v-icon>Accueil
      </v-btn>

      <v-btn
        color="#FFD600"
        v-if="isGerant"
        class="mr-4 hidden-sm-and-down"
        :to="'/gerant/salle/' + currentUser.id"
        text
      >Salle De Sport</v-btn>
      <v-btn
        color="#FFD600"
        v-if="isCoach"
        :to="'/coach/programmes/' + currentUser.id"
        class="nav-item nav-link hidden-sm-and-down"
        text
      >
        <v-icon class="mr-1">mdi-account-star</v-icon>Programmes
      </v-btn>

      <v-btn
        color="#FFD600"
        v-if="isClient"
        :to="'/client/programmes/'"
        class="nav-item nav-link hidden-sm-and-down"
        text
      >
        <v-icon class="mr-1">mdi-account-star</v-icon>Programmes
      </v-btn>

      <v-btn color="#FFD600" v-if="!isChecked" v-on:click="show" class="mr-4" to="/login" text>
        <v-icon class="mr-1 hidden-sm-and-down">mdi-login</v-icon>Connexion
      </v-btn>

      <v-btn color="#FFD600" v-if="isChecked" @click="logout" class="nav-item nav-link" text>
        <v-icon class="mr-1 hidden-sm-and-down">mdi-logout</v-icon>Deconnexion
      </v-btn>
    </v-toolbar>

    <v-navigation-drawer temporary app class="hidden-md-and-up" v-model="drawer" color="#3B444B">
      <v-btn icon @click.stop="drawer = !drawer">
        <v-icon>mdi-chevron-left</v-icon>
      </v-btn>
      <v-list>
        <v-list-item>
          <v-list-item-action>
            <v-icon class="white--text">mdi-equal-box</v-icon>
          </v-list-item-action>
          <v-list-item-content>
            <v-list-item-title class="white--text">
              <v-btn color="#FFD600" class="mr-4" to="/" text>Accueil</v-btn>
            </v-list-item-title>
          </v-list-item-content>
        </v-list-item>
        <v-list-item v-if="isCoach">
          <v-list-item-action>
            <v-icon class="white--text">mdi-account-star</v-icon>
          </v-list-item-action>
          <v-list-item-content>
            <v-list-item-title class="white--text">
              <v-btn
                class="mr-4"
                color="#FFD600"
                :to="'/coach/programmes/' + currentUser.id"
                text
              >Programmes</v-btn>
            </v-list-item-title>
          </v-list-item-content>
        </v-list-item>
        <v-list-item v-if="isClient">
          <v-list-item-action>
            <v-icon class="white--text">mdi-account</v-icon>
          </v-list-item-action>
          <v-list-item-content>
            <v-list-item-title class="white--text">
              <v-btn color="#FFD600" class="mr-4" to="/client/programmes" text>Programmes</v-btn>
            </v-list-item-title>
          </v-list-item-content>
        </v-list-item>
        <v-list-item v-if="isGerant">
          <v-list-item-action>
            <v-icon class="white--text">mdi-office</v-icon>
          </v-list-item-action>
          <v-list-item-content>
            <v-list-item-title class="white--text">
              <v-btn
                color="#FFD600"
                class="mr-4"
                :to="'/gerant/salle/' + currentUser.id"
                text
              >Salle De Sport</v-btn>
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
import Axios from "axios";

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
    }
  },

  created() {
    authenticationService.currentUser.subscribe(x => (this.currentUser = x));
  }
};
</script>
