<template>
  <v-container>
    <addProgramme v-on:addProgramme="programmes.push($event)"></addProgramme>
    <v-row>
      <v-col cols="12" sm="6" md="4" lg="4" v-for="(programme,key) in programmes" :key="key">
        <v-card class="mx-auto" max-width="300">
          <v-img :src="programme.image.lien" height="200px"></v-img>

          <v-card-title>{{programme.name}}</v-card-title>

          <v-card-text>Difficulté : {{programme.difficulte}}</v-card-text>

          <v-card-text> Prix : {{programme.prix}} </v-card-text>
          <v-card-actions>

            <v-btn color="purple" text :to="'/coach/programme/' + programme.id"> Voir plus </v-btn>
          </v-card-actions>
        </v-card>
      </v-col>
      
    </v-row>
  </v-container>
</template>

<script src="./showProgrammes.js" />