<template>
  <nav class="pb-1" flat height="10px" tile>
    <v-toolbar extended extension-height="10" dark color="#3B444B">
      <img class='mt-5' src="/storage/images/logo_gpe.png" height="80px" />
      <v-toolbar-title>
        <span style="color:#FFD600">G P E</span>

        <v-menu bottom offset-y origin="center center" transition="scale-transition">
          <template v-slot:activator="{ on, attrs }">
            <v-btn text color="#FFD600" dark v-bind="attrs" v-on="on" class="hidden-sm-and-down">
              <v-icon color="#FFD600">mdi-dumbbell</v-icon>menu
            </v-btn>
            <v-btn icon text color="#FFD600" dark v-bind="attrs" v-on="on" class="hidden-md-and-up">
              <v-icon color="#FFD600">mdi-dumbbell</v-icon>
            </v-btn>
          </template>
          <v-list dark color="#3B444B">
            <v-list-item>
              <v-list-item-action>
                <v-icon class="white--text">mdi-equal-box</v-icon>
              </v-list-item-action>
              <v-list-item-content>
                <v-list-item-title class="white--text">
                  <v-btn color="#FFD600" class="mr-4" to="/" text>Accueil</v-btn>
                </v-list-item-title>
              </v-list-item-content>
            </v-list-item>
            <v-list-item v-if="isCoach">
              <v-list-item-action>
                <v-icon class="white--text">mdi-account-star</v-icon>
              </v-list-item-action>
              <v-list-item-content>
                <v-list-item-title class="white--text">
                  <v-btn
                    class="mr-4"
                    color="#FFD600"
                    :to="'/coach/' + currentUser.id + '/programmes'"
                    text
                  >Programmes</v-btn>
                </v-list-item-title>
              </v-list-item-content>
            </v-list-item>
            <v-list-item v-if="isClient">
              <v-list-item-action>
                <v-icon class="white--text">mdi-account</v-icon>
              </v-list-item-action>
              <v-list-item-content>
                <v-list-item-title class="white--text">
                  <v-btn color="#FFD600" class="mr-4" to="/client/programmes" text>Programmes</v-btn>
                </v-list-item-title>
              </v-list-item-content>
            </v-list-item>
            <v-list-item v-if="isGerant">
              <v-list-item-action>
                <v-icon class="white--text">mdi-office</v-icon>
              </v-list-item-action>
              <v-list-item-content>
                <v-list-item-title class="white--text">
                  <v-btn
                    color="#FFD600"
                    class="mr-4"
                    :to="'/gerant/' + currentUser.id + '/salle'"
                    text
                  >Salle De Sport</v-btn>
                </v-list-item-title>
              </v-list-item-content>
            </v-list-item>
          </v-list>
        </v-menu>
      </v-toolbar-title>
      <v-spacer></v-spacer>

      <v-btn color="#FFD600" v-if="!isChecked" v-on:click="show" class="mr-4" to="/login" text>
        <v-icon class="mr-1 hidden-sm-and-down">mdi-login</v-icon>Connexion
      </v-btn>

      <v-btn color="#FFD600" v-if="isChecked" @click="logout" class="nav-item nav-link" text>
        <v-icon class="mr-1 hidden-sm-and-down">mdi-logout</v-icon>Deconnexion
      </v-btn>
    </v-toolbar>
  </nav>
</template>

<script src='./navbar.js' />
