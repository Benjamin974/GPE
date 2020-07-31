<template>
  <v-container>
    <h1 class="mb-10 text-center">Votre salle de sport</h1>
    <v-container class="mb-10 mt-10">
      <v-system-bar height="10%" color="#FDD600"></v-system-bar>
    </v-container>
    <v-btn color='#FDD600' class='mb-5' :to="'/gerant/'+ id_salle +'/liste_clients'"> Liste des clients </v-btn>
    <v-card class="mb-9" color="grey" v-for="(_salle, key) in salle" :key="key">
      <v-card-title class="text-center justify-center py-6">
        <h1 class="font-weight-bold display-3 white--text pr-5">{{_salle.name}}</h1>
        <addSalle :salle="_salle" />
      </v-card-title>

      <v-tabs v-model="tab" background-color="transparent" color="black" grow>
        <v-tab>Lieu</v-tab>
        <v-tab>Ajouter un client</v-tab>
        <v-tab>Horaire</v-tab>
      </v-tabs>

      <v-tabs-items v-model="tab">
        <v-tab-item class="text-center">
          <v-card color="white" flat>
            <v-card-text>Cette salle de musculation se trouve à {{_salle.lieu}}</v-card-text>
          </v-card>
        </v-tab-item>
        <v-tab-item>
          <v-card color="white" flat>
            <addUser />
          </v-card>
        </v-tab-item>
        <v-tab-item class="text-center">
          <v-card color="white" flat>
            <v-card-text
              v-if="horaire == ''"
            >Les horaires d'activités de la salle par jour: {{_salle.horaire}}</v-card-text>
            <v-card-text
              v-if="!horaire == ''"
            >Les horaires d'activités de la salle par jour: {{horaire}}</v-card-text>

            <v-btn text class="mb-5" @click="updateHoure">
              <v-icon>mdi-pencil</v-icon>Modifier
            </v-btn>
            <v-row justify="center">
              <v-col cols="12" md="6" sm="6">
                <h5 class="mb-5">Horaire d'ouverture</h5>
                <v-time-picker
                  header-color="#9E9E9E"
                  color="#FDD600"
                  format="24hr"
                  v-model="horaireOuverture"
                  min="05:00"
                  max="12:00"
                ></v-time-picker>
              </v-col>
              <v-col cols="12" md="6" sm="6">
                <h5 class="mb-5">Horaire de fermeture</h5>
                <v-time-picker
                  header-color="#9E9E9E"
                  color="#FDD600"
                  format="24hr"
                  v-model="horaireFermeture"
                  min="12:00"
                  max="23:00"
                ></v-time-picker>
              </v-col>
            </v-row>
          </v-card>
        </v-tab-item>
      </v-tabs-items>
    </v-card>
    <v-snackbar dark v-model="snackbar" :timeout="timeout">
      {{ erreur }}
      <template v-slot:action>
        <v-btn text color="#FFD600" @click="snackbar=false;">Fermer</v-btn>
      </template>
    </v-snackbar>
  </v-container>
</template>

<style scoped>
.my-event {
  overflow: hidden;
  text-overflow: ellipsis;
  white-space: nowrap;
  border-radius: 2px;
  background-color: #1867c0;
  color: #ffffff;
  border: 1px solid #1867c0;
  font-size: 12px;
  padding: 3px;
  cursor: pointer;
  margin-bottom: 1px;
  left: 4px;
  margin-right: 8px;
  position: relative;
}

.my-event.with-time {
  position: absolute;
  right: 4px;
  margin-right: 0px;
}
</style>
<script src="./salle.js">
</script>