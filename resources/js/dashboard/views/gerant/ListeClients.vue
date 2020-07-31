<template>
  <v-container class='mb-7'>
    <h1 class="mb-10 text-center">Votre salle de sport</h1>
    <v-container class="mb-10 mt-10">
      <v-system-bar height="10%" color="#FDD600"></v-system-bar>
    </v-container>
    <h4>Liste des clients</h4>
    <v-list three-line v-for="(client, key) in clients" :key="key">
      <template>
        <v-divider divider="true"></v-divider>

        <v-list-item @click>
          <v-list-item-content>
            <v-list-item-title>
              {{client.name}}
            </v-list-item-title>
            <v-list-item-subtitle>
              <span class="text--primary">Email : {{client.email}}</span> &mdash;
            </v-list-item-subtitle>
          </v-list-item-content>
          <deleteClient :client='client' :clients='clients'></deleteClient>
        </v-list-item>
      </template>
    </v-list>
  </v-container>
</template>

<script src='./listeClients.js' />