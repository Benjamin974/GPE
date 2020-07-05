<template>
  <v-content>
    <v-container class="fill-height" fluid>
      <v-row align="center" justify="center">
        <v-col cols="12" sm="8" md="4">
            <v-toolbar color="grey darken-3" dark flat>
              <v-toolbar-title>Veuillez vous identifer</v-toolbar-title>
              <v-spacer />
            </v-toolbar>
            <v-card-text>
              <v-form ref="form" v-model="valid" :lazy-validation="lazy">
                <v-text-field
                  label="Email de connexion"
                  v-model="user.email"
                  name="login"
                  :rules="emailRules"
                  prepend-icon="mdi-account"
                  type="text"
                />

                <v-text-field
                  id="password"
                  label="Mot de passe"
                  v-model="user.password"
                  :rules="pwdRules"
                  name="password"
                  prepend-icon="mdi-lock"
                  type="password"
                />
              </v-form>
            </v-card-text>
            <v-card-actions>
              <v-btn light color="#FDD600" :disabled="!valid" @click="connection">Connexion</v-btn>
            </v-card-actions>
        </v-col>
      </v-row>
    </v-container>
  </v-content>
</template>

<script src='./login.js'>
</script>