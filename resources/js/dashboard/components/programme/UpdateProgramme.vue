<template>
  <v-dialog max-width="300px">
    <template v-slot:activator="{ on }">
      <v-btn v-on="on">
        Modifier
      </v-btn>
    </template>
    <v-card>
      <v-card-text class="text-center">

        <div v-for="(item,key) in modalSeance" :key="key">
          <v-row v-if="item.editBool" class="mb-4">
            <input v-if="item.type==='text'" v-model="item.value" />
            <input v-if="item.type==='textarea'" v-model="item.value" />
            <v-btn icon @click="updateData(item)">
              <v-icon>mdi-checkbox-marked-outline</v-icon>
            </v-btn>
            <v-btn icon @click="item.editBool = false">
              <v-icon>mdi-close-circle</v-icon>
            </v-btn>
          </v-row>
          <p v-else>
            {{item.value}}
            <v-btn icon @click="item.editBool = true">
              <v-icon>mdi-pencil</v-icon>
            </v-btn>
          </p>
        </div>
      </v-card-text>
      <v-divider></v-divider>
    </v-card>
  </v-dialog>
</template>

<script src="./updateProgramme.js" />