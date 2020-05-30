<template>
  <div>
    <v-card class="ma-5 pa-3">
      <v-row class="d-flex">
        <v-col class="text-center">
          <h1>GESTIONNAIRE DE PROGRAMME D'ENTRAÎNEMENT</h1>
        </v-col>
      </v-row>
      <v-snackbar v-if="isChecked" v-model="snackbar" :timeout="timeout">
        {{ text }}
        <v-btn color="blue" text @click="snackbar=false;">Close</v-btn>
      </v-snackbar>
      <v-snackbar v-if="!isChecked" v-model="snackbar" :timeout="timeout">
        Vous n'êtes pas connecté
        <v-btn color="blue" text @click="snackbar=false;">Close</v-btn>
      </v-snackbar>
    </v-card>
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
      timeout: 3000
    };
  },

  computed: {
    isChecked() {
      return this.currentUser;
    }
  },
  methods: {
    snackCheck() {
      this.snackbar = true;
      if (!_.isEmpty(this.currentUser)) {
        if (this.currentUser.role.name == "client") {
          this.text = "Bienvenue client" + ' ' + this.currentUser.name;
        } else if (this.currentUser.role.name == "coach") {
          this.text = "Bienvenue entraineur" + ' ' + this.currentUser.name;
        } else if (this.currentUser.role.name == "gerant") {
          this.text = "Bienvenue gérant" + ' ' + this.currentUser.name;
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