<template>
  <v-card class="md-10 mx-auto">
    <v-container>
      <v-row align="center" justify="center">
        <v-form ref="form" v-model="valid" :lazy-validation="lazy">
          <v-select
            v-model="client"
            :items="clients"
            item-text="name"
            label="clients"
            persistent-hint
            return-object
            single-line
            @change="choiceClient(client)"
            required
          ></v-select>

          <div v-if="!email == ''" class="mb-5 text-center">Email du client : {{email}}</div>
          <div v-if="!sameClient == ''" class="mb-5 text-center" color='red'>{{sameClient}}</div>
          <v-textarea
            filled
            name="input-7-4"
            label="écrivez votre texte"
            value
            v-model="message"
            required
          ></v-textarea>

          <v-btn :disabled="!valid" color="success" class="mr-4" @click="validate">Validate</v-btn>

          <v-btn color="error" class="mr-4" @click="reset">Reinitialiser</v-btn>
        </v-form>
      </v-row>
    </v-container>
  </v-card>
</template>

<script src='./addUser.js' />