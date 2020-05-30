<template>
  <v-container>
    <h1 class="text-center pb-5">Liste des programmes disponibles</h1>

    <v-row class="pt-5">
      <v-col md="4" v-for="(programme, key) in programmes" :key="key">
        <v-card class="mx-auto" max-width="344" outlined>
          <v-list-item three-line>
            <v-list-item-content>
              <div class="overline mb-4">{{programme.name}}</div>
              <v-list-item-subtitle>Difficulté : {{programme.difficulte}}</v-list-item-subtitle>
            </v-list-item-content>

            <v-list-item-avatar tile size="80" color="grey">
              <v-img :src="programme.image.lien"></v-img>
            </v-list-item-avatar>
          </v-list-item>

          <v-card-actions>
            <modalProgramme v-bind:programme="programme"></modalProgramme>
          </v-card-actions>
        </v-card>
      </v-col>
    </v-row>
    <div class="pt-5 pb-5">
      <v-select
        :items="programmes"
        v-model="programmeChoisi"
        item-text="name"
        item-value="id"
        label="Selectionner votre programme :"
        return-object
        dense
        solo
      ></v-select>
      <v-row>
        <v-col md="6">
          <v-btn text class="mb-5" color="white" @click="choixProgramme">choisir</v-btn>
        </v-col>
        <v-col md="6" v-for="(client, key) in clients" :key="key">
          <strong v-if="donneeAdd == false">Votre programme : {{recupProgrammes(client.programme)}}</strong>
          <v-btn v-if="donneeAdd == false" text @click="deletePrograme()">
            <v-icon>mdi-close-box-outline</v-icon>
          </v-btn>
          <strong v-if="donneeAdd == true">Votre programme : {{programmeChoisi.name}}</strong>
          <v-btn v-if="donneeAdd == true" text @click="deletePrograme()">
            <v-icon>mdi-close-box-outline</v-icon>
          </v-btn>
        </v-col>
      </v-row>
      <v-snackbar v-model="snackbar" :timeout="timeout">
        {{ text }}
        <v-btn color="blue" text @click="snackbar=false;">Close</v-btn>
      </v-snackbar>
    </div>
  </v-container>
</template>

<script src="./programmes.js" />