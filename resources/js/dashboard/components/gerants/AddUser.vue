<template>
  <v-card class="md-10 mx-auto">
    <v-container>
      <v-row align="center" justify="center">
        <v-form ref="form" v-model="valid" :lazy-validation="lazy">
          <v-row>
            <v-col md="6">
              <v-text-field label="nom" :rules="nameRules" v-model="nom" />
              <v-text-field label="prenom" :rules="firstnameRules" v-model="prenom" />
              <v-text-field label="e-mail" :rules="emailRules" type="text" v-model="email" />
            </v-col>
            <v-col md="6">
              <v-textarea
                filled
                name="input-7-4"
                label="votre message"
                value
                v-model="message"
                required
                height="188"
              ></v-textarea>
            </v-col>
            <v-row>
              <v-col cols="12" v-if="!sameClient == ''" class="mb-5 text-center">
                {{sameClient}}
              </v-col>
            </v-row>
          </v-row>
          <v-row class="text-center">
            <v-col cols="6">
              <v-btn :disabled="!valid" color="success" class="mr-4" @click="validate">Validate</v-btn>
            </v-col>
          </v-row>
        </v-form>
      </v-row>
    </v-container>
  </v-card>
</template>

<script src='./addUser.js' />