<template>
  <v-container>
    <v-container class="mb-10 mt-10">
    <h1>Identifiez-vous</h1>
    
      <v-system-bar height="10%" color="#FDD600"></v-system-bar>
    </v-container>
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
              @keydown.enter="connection"
            />
          </v-form>
        </v-card-text>
        <v-card-actions>
          <v-btn light color="#FDD600" :disabled="!valid" @click="connection">Connexion</v-btn>
          <div class="ml-7">
            <span>{{erreur}}</span>
          </div>
        </v-card-actions>
  </v-container>
</template>

<script src='./login.js'>
</script>