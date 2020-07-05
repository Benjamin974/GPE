<template>
  <v-container>
    <v-card class="mb-5" color="basil">
      <v-card-title
        class="text-center justify-center py-6"
      >
        <h1 class="font-weight-bold display-3 brown--text pr-5">{{programme.name}}</h1>
      </v-card-title>

      <v-tabs v-model="tab" background-color="transparent" color="basil" grow>
        <v-tab>Salle de sport</v-tab>
        <v-tab>Seance</v-tab>
        <v-tab>Difficulté</v-tab>
      </v-tabs>

      <v-tabs-items v-model="tab">
        <v-tab-item>
          <v-card color="basil" flat>
            <v-card-text>
              Nom: {{programme.salleDeSport.name}}
              <br />
              lieu: {{programme.salleDeSport.lieu}}
              <br />
              horaire: {{programme.salleDeSport.horaire}}
            </v-card-text>
          </v-card>
        </v-tab-item>
        <v-tab-item>
          <v-card color="basil" flat>
            <v-card-text>
              Contenu de la seance (par jour):
              <br />
              {{programme.seance.exercice}} <br>
            </v-card-text>
          </v-card>
        </v-tab-item>
        <v-tab-item>
          <v-card color="basil" flat>
            <v-card-text>
              {{programme.difficulte}}

            </v-card-text>
          </v-card>
        </v-tab-item>
      </v-tabs-items>
    </v-card>
  </v-container>
</template>

<script src="./programme.js" />

<style>
/* Helper classes */
.basil {
  background-color: #fffbe6 !important;
}
.basil--text {
  color: #356859 !important;
}
</style>