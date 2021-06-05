<template>
  <div>
    <v-app-bar
      color="light-green lighten-1"
      dark
    >
      <v-app-bar-nav-icon @click="drawer = true"></v-app-bar-nav-icon>

      <v-toolbar-title>Star Wars Films</v-toolbar-title>

      <v-spacer></v-spacer>

      <v-btn icon>
        <router-link to="/user/films/favorites" style="text-decoration: none; color: inherit;">
          <v-icon>mdi-heart</v-icon>
        </router-link>
      </v-btn>

      <v-btn icon>
        <v-icon>mdi-magnify</v-icon>
      </v-btn>

    </v-app-bar>
    <v-navigation-drawer
      v-model="drawer"
      absolute
      temporary
      color="black"
    >
      <v-list
        nav
        dense
      >
        <v-list-item-group
          v-model="group"
          active-class="light-green--text text--lighten-1"
          class="white--text"
        >
          <v-list-item >
            <v-list-item-icon>
              <v-icon color="white">mdi-home</v-icon>
            </v-list-item-icon>
            <v-list-item-title style="color: #fff !important">Home</v-list-item-title>
          </v-list-item>

          <router-link to="/films" style="text-decoration: none; color: inherit;">
            <v-list-item> 
              <v-list-item-icon>
                <v-icon color="white">mdi-videocam-outline</v-icon>
              </v-list-item-icon>
              <v-list-item-title style="color: #fff !important">Films</v-list-item-title>
            </v-list-item>
          </router-link>
        </v-list-item-group>
      </v-list>
    </v-navigation-drawer>
  </div>
</template>

<script>
  export default {
    data: () => ({
      drawer: false,
      group: null,
    }),
  }
</script>

