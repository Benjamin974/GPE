<template>
  <v-container>
    <v-card color="basil">
      <v-card-title
        class="text-center justify-center py-6"
        v-for="(_programme,key) in programme"
        :key="key"
      >
        <h1 class="font-weight-bold display-3 brown--text pr-5">{{_programme.name}}</h1>
      </v-card-title>

      <v-tabs v-model="tab" background-color="transparent" color="basil" grow>
        <v-tab>Coach</v-tab>
        <v-tab>Salle de sport</v-tab>
        <v-tab>Seance</v-tab>
        <v-tab>Difficulté</v-tab>
      </v-tabs>

      <v-tabs-items v-model="tab">
        <v-tab-item>
          <v-card color="basil" flat>
            <v-card-text v-for="(_coach,key) in coach" :key="key">
              Nom: {{_coach.name}}
              <br />
              Prénom: {{_coach.surname}}
              <br />
              email: {{_coach.email}}
            </v-card-text>
          </v-card>
        </v-tab-item>
        <v-tab-item>
          <v-card color="basil" flat>
            <v-card-text v-for="(_salleDeSport,key) in salleDeSport" :key="key">
              Nom: {{_salleDeSport.name}}
              <br />
              lieu: {{_salleDeSport.lieu}}
              <br />
              horaire: {{_salleDeSport.horaire}}
            </v-card-text>
          </v-card>
        </v-tab-item>
        <v-tab-item>
          <v-card color="basil" flat>
            <v-card-text v-for="(_seance,key) in seance" :key="key">
              Contenu de la seance (par jour):
              <br />
              {{_seance.contenu_seance_par_jour}} <br>
              <updateProgramme v-bind:_seance="_seance"></updateProgramme>
            </v-card-text>
          </v-card>
        </v-tab-item>
        <v-tab-item>
          <v-card color="basil" flat>
            <v-card-text v-for="(_programme,key) in programme" :key="key">
              {{_programme.difficulte}}

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