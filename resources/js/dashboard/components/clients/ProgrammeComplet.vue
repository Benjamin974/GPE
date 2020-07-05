<template>
  <v-row justify="center">
    <v-btn text @click.stop="dialog = true">
      Voir plus
      <v-icon>mdi-arrow-right</v-icon>
    </v-btn>

    <v-dialog v-model="dialog" max-width="290">
      <v-card>
        <v-card-title class="headline">
          {{programme.name}}
          <br />
          Prix : {{programme.prix}}
        </v-card-title>
        <v-card-text>
          difficulté : {{programme.difficulte}}
          <br />
          Horaire salle de sport : {{programme.salleDeSport.horaire}}
          <br />
          Séance : {{programme.seance.exercice}}
          <v-btn icon @click="show = !show">
            <v-icon>{{ show ? 'mdi-chevron-up' : 'mdi-chevron-down' }}</v-icon>
          </v-btn>
          <v-expand-transition>
            <div v-show="show">
              <v-divider></v-divider>
              <v-card class="mx-auto" max-width="400" tile>
                <v-list-item>
                  <v-list-item-content>
                    <v-list-item-title>Seance</v-list-item-title>
                  </v-list-item-content>
                </v-list-item>

                <v-list-item two-line>
                  <v-list-item-content>
                    <v-list-item-title>Nombre de série</v-list-item-title>
                    <v-list-item-subtitle>{{programme.seance.quantite_serie}}</v-list-item-subtitle>
                  </v-list-item-content>
                </v-list-item>

                <v-list-item three-line>
                  <v-list-item-content>
                    <v-list-item-title>Temps de récuperation</v-list-item-title>
                    <v-list-item-subtitle>{{programme.seance.temps_recuperation}}</v-list-item-subtitle>
                  </v-list-item-content>
                </v-list-item>

                <v-list-item four-line>
                  <v-list-item-content>
                    <v-list-item-title>Quantité de jour</v-list-item-title>
                    <v-list-item-subtitle>{{programme.seance.nombre_jours}}</v-list-item-subtitle>
                  </v-list-item-content>
                </v-list-item>
              </v-card>
            </div>
          </v-expand-transition>
        </v-card-text>

        <v-card-actions>
          <v-spacer></v-spacer>
          <v-btn color="green darken-1" text @click="dialog = false">D'accord</v-btn>
        </v-card-actions>
      </v-card>
    </v-dialog>
  </v-row>
</template>

<script src="./programmeComplet.js">
</script>