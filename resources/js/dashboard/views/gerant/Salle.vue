<template>
  <v-container>
    <h1 class="mb-10 text-center">Votre salle de sport</h1>
    <v-container class="mb-10 mt-10">
      <v-system-bar height="10%" color="#FDD600"></v-system-bar>
    </v-container>

    <v-card class="mb-9" color="grey" v-for="(_salle, key) in salle" :key="key">
      <v-card-title class="text-center justify-center py-6">
        <h1 class="font-weight-bold display-3 white--text pr-5">{{_salle.name}}</h1>
        <addSalle :salle="_salle" />
      </v-card-title>

      <v-tabs v-model="tab" background-color="transparent" color="black" grow>
        <v-tab>Lieu</v-tab>
        <v-tab>Ajouter un client</v-tab>
        <v-tab>Horaire</v-tab>
      </v-tabs>

      <v-tabs-items v-model="tab">
        <v-tab-item>
          <v-card color="white" flat>
            <v-card-text>Cette salle de musculation se trouve à {{_salle.lieu}}</v-card-text>
          </v-card>
        </v-tab-item>
        <v-tab-item>
          <v-card color="white" flat>
            <addUser />
          </v-card>
        </v-tab-item>
        <v-tab-item>
          <v-card color="white" flat>
            <v-card-text>Les horaires d'activités de la salle par jour: {{_salle.horaire}}</v-card-text>
          </v-card>
          <v-row>
            <v-col>
              <v-sheet height="400">
                <v-calendar
                  ref="calendar"
                  :now="today"
                  :value="today"
                  :events="events"
                  color="primary"
                  type="week"
                ></v-calendar>
              </v-sheet>
            </v-col>
          </v-row>
        </v-tab-item>
      </v-tabs-items>
    </v-card>
  </v-container>
</template>

<style scoped>
.my-event {
  overflow: hidden;
  text-overflow: ellipsis;
  white-space: nowrap;
  border-radius: 2px;
  background-color: #1867c0;
  color: #ffffff;
  border: 1px solid #1867c0;
  font-size: 12px;
  padding: 3px;
  cursor: pointer;
  margin-bottom: 1px;
  left: 4px;
  margin-right: 8px;
  position: relative;
}

.my-event.with-time {
  position: absolute;
  right: 4px;
  margin-right: 0px;
}
</style>
<script src="./salle.js">
</script>