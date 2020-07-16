  <template>
  <v-row justify="center">
    <v-dialog v-model="dialog" persistent max-width="700px">
      <template v-slot:activator="{ on }">
        <v-btn v-if="!isModification" class="ma-2" dark v-on="on" tile outlined color="black">
          Nouveau programme
          <v-icon>mdi-shape-square-plus</v-icon>
        </v-btn>
        <v-btn
          text
          v-if="isModification"
          class="ma-2"
          dark
          v-on="on"
          tile
          outlined
          color="#FDD600"
          @click="updateDatas()"
        >
          <v-icon>mdi-pencil</v-icon>
        </v-btn>
      </template>
      <v-card>
        <v-form id="addCircuit" @submit="ajout">
          <v-card-title>
            <span class="headline" v-if="!isModification">Ajouter un Programme</span>
            <span class="headline" v-if="isModification">Modifier le programme</span>
          </v-card-title>

          <v-card-text>
            <v-container>
              <v-row>
                <v-col cols="12" sm="6" md="4">
                  <v-text-field v-model="name" :rules="nameRules" label="Nom du programme" required></v-text-field>
                </v-col>
                <v-col cols="12" sm="6" md="4">
                  <v-select
                    v-model="selectImg"
                    :items="itemsImg"
                    item-text="lien"
                    item-value="id"
                    label="Images"
                    persistent-hint
                    return-object
                    single-line
                  ></v-select>
                </v-col>
                <v-col cols="12" sm="6" md="4">
                  <v-text-field
                    v-model="difficulte"
                    :rules="difficulteRules"
                    label="Difficulté"
                    persistent-hint
                    required
                  ></v-text-field>
                </v-col>
                <v-col cols="12" sm="6" md="4">
                  <v-text-field
                    v-model="nbre_seance_semaine"
                    :rules="nbre_seance_semaineRules"
                    label="nombre de seance par semaine"
                    required
                  ></v-text-field>
                </v-col>
                <v-col cols="12" sm="6" md="4">
                  <v-text-field v-model="prix" :rules="prixRules" label="Prix" required></v-text-field>
                </v-col>
                <v-col cols="12" sm="6" md="4">
                  <v-select
                    :rules="id_salle_de_sportRules"
                    v-model="selectSdsport"
                    :items="itemsSdsport"
                    item-text="name"
                    item-value="id"
                    label="salle"
                    persistent-hint
                    return-object
                    single-line
                  ></v-select>
                </v-col>
                <v-col cols="12" sm="6" md="4">
                  <v-select
                    v-model="selectSeance"
                    :items="itemsSeance"
                    item-text="exercice"
                    item-value="id"
                    label="seance"
                    persistent-hint
                    return-object
                    single-line
                  ></v-select>
                </v-col>
              </v-row>
            </v-container>
          </v-card-text>
          <v-card-actions>
            <v-spacer></v-spacer>
            <v-btn color="red" text @click="dialog = false">Annuler</v-btn>
            <v-btn color="brown" text @click="ajout">Enregistrer</v-btn>
          </v-card-actions>
        </v-form>
      </v-card>
    </v-dialog>
    <v-snackbar v-model="snackbar" :timeout="timeout">
      {{ text }}
      <v-btn color="blue" text @click="snackbar=false;">Close</v-btn>
    </v-snackbar>
  </v-row>
</template>
<script src="./AddProgramme.js"/>