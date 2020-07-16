<template>
  <v-container>
    <addProgramme v-on:addProgramme="programmes.push($event)" class="pb-5"></addProgramme>
    <div width="80%" class="pt-5 pb-5">
      <div v-if="!programmes.length">
        <p>Vous n'avez pas de programme</p>
      </div>
      <v-data-table
        v-if="programmes.length"
        :headers="headers"
        :items="programmes"
        class="elevation-4"
        :items-per-page="5"
      >
        <template v-slot:item.programmes="{ item }">{{item.name}}</template>
        <template v-slot:item.difficulte="{ item }">{{item.difficulte}}</template>
        <template v-slot:item.image.lien="{ item }">
          <v-img :src="item.image.lien" aspect-ratio="1.7"></v-img>
        </template>
        <template v-slot:item.seance="{ item }">{{item.seance}}</template>
        <template v-slot:item.actions="{ item }">
          <v-row>
            <v-col md="6">
              <addProgramme :programme="item" :programmes='programmes' :isModification="true" />
            </v-col>
            <v-col md="6">
              <deleteProgramme
                :programme="item"
                :programmes="programmes"
              />
            </v-col>
          </v-row>
        </template>
      </v-data-table>
    </div>
  </v-container>
</template>

<script src="./showProgrammes.js" />