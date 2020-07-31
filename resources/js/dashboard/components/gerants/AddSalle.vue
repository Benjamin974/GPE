<template>
  <div>
    <v-dialog v-model="dialog" persistent max-width="700px">
      <template v-slot:activator="{ on }">
        <v-btn v-on="on" @click="updateDatas" color="#FDD600">
          <v-icon>mdi-shape-square-plus</v-icon>
        </v-btn>
      </template>
      <v-card>
        <v-form>
          <v-card-title>Modifier votre salle de sport</v-card-title>
          <v-card-text>
            <v-container>
              <v-row>
                <v-col cols="12" sm="6" md="4">
                  <v-text-field v-model="name" label="nom"></v-text-field>
                </v-col>
                <v-col cols="12" sm="6" md="4">
                  <v-text-field v-model="lieu" label="lieu"></v-text-field>
                </v-col>
              </v-row>
            </v-container>
          </v-card-text>

          <v-btn color="red" text @click="dialog = false">Annuler</v-btn>
          <v-btn color="green" text @click="updateRoom">Enregistrer</v-btn>
        </v-form>
      </v-card>
    </v-dialog>
  </div>
</template>

<script src="./addSalle.js">
</script>