<template>
  <v-container>
    <h1>Créer votre compte</h1>
    <v-container class="mb-10 mt-10">
      <v-system-bar height="10%" color="#FDD600"></v-system-bar>
    </v-container>

    <v-form class="mb-10" ref="form" v-model="valid" lazy-validation>
      <v-text-field v-model="name" :counter="15" :rules="nameRules" label="Nom" required></v-text-field>
      <v-text-field v-model="surname" :counter="15" :rules="nameRules" label="Prenom" required></v-text-field>
      <v-text-field v-model="email" :rules="emailRules" label="E-mail" required></v-text-field>
      <v-text-field v-model="password" :rules="passwordRules" label="Mots de passe" required></v-text-field>

      <v-checkbox
        v-model="checkbox"
        :rules="[v => !!v || 'Tu dois être d\'accord pour continuer!']"
        label="Est tu d'accord ?"
        required
      ></v-checkbox>
      <v-btn
        v-if="text == ''"
        :disabled="!valid"
        color="grey"
        class="mr-4"
        @click="validate"
      >Validate</v-btn>
      <v-btn v-if="text == ''" color="error" class="mr-4 md-5" @click="reset">Reinitialiser</v-btn>
      <p class="mt-5">
        {{ text }}
        <v-btn v-if="text != ''" color="grey" @click="redirection">Se connecter</v-btn>
      </p>
    </v-form>
    <v-snackbar style="color:black" v-model="snackbar"></v-snackbar>
  </v-container>
</template>

<script src="./register.js" />