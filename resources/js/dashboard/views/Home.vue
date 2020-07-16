<template>
  <div>
    <v-card class="mb-10 pa-3 grey lighten-1" elevation="15">
      <v-row class="d-flex">
        <v-col class="text-center">
          <h2>GESTIONNAIRE DE PROGRAMME D'ENTRAÎNEMENT</h2>
        </v-col>
      </v-row>
      <v-snackbar style="color:black" v-if="isChecked" v-model="snackbar" :timeout="timeout">
        {{ text }}
        <v-btn color="grey" @click="snackbar=false;">Close</v-btn>
      </v-snackbar>
      <v-snackbar v-if="!isChecked" v-model="snackbar" :timeout="timeout">
        Vous n'êtes pas connecté
        <v-btn color="blue" text @click="snackbar=false;">Close</v-btn>
      </v-snackbar>
    </v-card>
    <v-container class="mb-10 mt-10">
      <v-system-bar height="10%" color="#FDD600"></v-system-bar>
    </v-container>

    <v-container class="text-center">
      <h3 v-if="isChecked">{{ text }}</h3>
      <v-spacer></v-spacer>
      <div></div>
    </v-container>
    <v-banner v-if="!isChecked" single-line class="mb-10">
      Il n'y a actuellement aucun utilisateur connecté
      <template v-slot:actions></template>
    </v-banner>
    <v-banner v-if="isClient">
      <v-row>
        <v-col>
          <v-card-actions>
            <v-btn color="#FDD600" class="text-center" to="client/programmes">voir les programmes</v-btn>
          </v-card-actions>
        </v-col>
        <v-col>
          <p class="subtitle-2 text-center">
            Vous pouvez désormais choisir un programme en fonction de vos objectifs !
            <br />« Vous êtes le seul à pouvoir choisir qui vous voulez êtres. »
          </p>
          <v-spacer></v-spacer>
        </v-col>
      </v-row>

      <template v-slot:actions></template>
    </v-banner>
    <v-banner v-if="isCoach" class="mb-10">
      <v-row>
        <v-col>
          <v-card-actions>
            <v-btn
              color="#FDD600"
              class="text-center"
              :to="'/coach/programmes/' + currentUser.id"
            >Mes programmes</v-btn>
          </v-card-actions>
        </v-col>
        <v-col>
          <p>
            Vous pouvez désormais voir vos programmes, les modifier ou les supprimer comme vous le souhaitez !
            <br />Les clients comptent sur vous pour définir les meilleurs programmes d'entraînement !
            <br />
          </p>

          <v-spacer></v-spacer>
        </v-col>
      </v-row>

      <template v-slot:actions></template>
    </v-banner>
    <v-banner v-if="isGerant" single-line class="mb-10">
      <v-row>
        <v-col>
          <v-card-actions>
            <v-btn
              color="#FDD600"
              class="text-center"
              :to="'gerant/salle/' + currentUser.id"
            >Ma salle de sport</v-btn>
          </v-card-actions>
        </v-col>
        <v-col>
          <p>
            Vous pouvez désormais modifier votre salle de sport
            <br />Les clients comptent sur votre salle de sport !
            <br />
          </p>

          <v-spacer></v-spacer>
        </v-col>
      </v-row>

      <template v-slot:actions></template>
    </v-banner>
  </div>
</template>

<script>
import { authenticationService } from "../_services/authentication.service";
import { Role } from "../_helpers/role";
export default {
  data() {
    return {
      snackbar: false,
      text: "",
      timeout: 3000,
      colors: [
        "indigo",
        "warning",
        "pink darken-2",
        "red lighten-1",
        "deep-purple accent-4"
      ],
      slides: ["First", "Second", "Third", "Fourth", "Fifth"]
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
    snackCheck() {
      this.snackbar = true;
      if (!_.isEmpty(this.currentUser)) {
        if (this.currentUser.role.name == "client") {
          this.text = "Bienvenue client" + " " + this.currentUser.name;
        } else if (this.currentUser.role.name == "coach") {
          this.text = "Bienvenue entraineur" + " " + this.currentUser.name;
        } else if (this.currentUser.role.name == "gerant") {
          this.text = "Bienvenue gérant" + " " + this.currentUser.name;
        }
      }
    }
  },

  created() {
    authenticationService.currentUser.subscribe(x => (this.currentUser = x));
    this.snackCheck();
  }
};
</script>

<style scoped>
.adminDonnee {
  display: flex;
  flex-flow: row;
  justify-content: flex-start;
  height: 50px;
  padding-right: 5%;
  padding-left: 5%;
  padding-top: 15px;
  margin: 10px;
}
</style>