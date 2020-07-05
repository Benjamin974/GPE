<template>
  <v-container>
    <h1 class="mb-10 text-center">Votre salle de sport</h1>
    <v-container class="mb-10 mt-10">
      <v-system-bar height="10%" color="#FDD600"></v-system-bar>
    </v-container>

    <v-card class="mb-9" color="grey" v-for="(_salle, key) in salle" :key="key">
      <v-card-title class="text-center justify-center py-6">
        <h1 class="font-weight-bold display-3 white--text pr-5">{{_salle.name}}</h1>
        <addSalle :salle="_salle" />
      </v-card-title>

      <v-tabs v-model="tab" background-color="transparent" color="black" grow>
        <v-tab>Lieu</v-tab>
        <v-tab> Ajouter un client</v-tab>
        <v-tab>Horaire</v-tab>
      </v-tabs>

      <v-tabs-items v-model="tab">
        <v-tab-item>
          <v-card color="white" flat>
            <v-card-text>Cette salle de musculation se trouve à {{_salle.lieu}}</v-card-text>
          </v-card>
        </v-tab-item>
        <v-tab-item>
          <v-card color='white' flat>
            <addUser />
          </v-card>
        </v-tab-item>
        <v-tab-item>
          <v-card color="white" flat>
            <v-card-text>Les horaires d'activités de la salle par jour: {{_salle.horaire}}</v-card-text>
          </v-card>
        </v-tab-item>
      </v-tabs-items>
    </v-card>
    
  </v-container>
</template>

<script src="./salle.js">
</script>