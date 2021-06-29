<template>
  <v-col>
    <v-dialog
      v-model="dialog"
      fullscreen
      hide-overlay
      transition="dialog-bottom-transition"
    >
      <template v-slot:activator="{ on, attrs }">
        <v-btn
          color="info"
          small
          dark
          v-bind="attrs"
          v-on="on"
        >
          <v-icon dark>
            {{ data.buttonIcon }}
          </v-icon>
          {{ data.listName }}
        </v-btn>
      </template>
      <v-card>
        <v-toolbar
          dark
          color="primary"
        >
          <v-btn
            icon
            dark
            @click="dialog = false"
          >
            <v-icon>mdi-close</v-icon>
          </v-btn>
          <v-toolbar-title>{{ capitalize(data.listName) }} List</v-toolbar-title>
          <v-spacer></v-spacer>
        </v-toolbar>

        <v-card-text>
          <v-chip-group multiple column active-class="primary--text">
            <v-chip
                v-for="(item, index) in items" :key="index"
                class="mr-2 mb-2"
                @click="toggleItem(item.id)"
            >
            {{ item['name'] }}
            </v-chip>
          </v-chip-group>
        </v-card-text>
      </v-card>
    </v-dialog>
  </v-col>
</template>

<script>
  export default {
    data () {
      return {
        dialog: false,
        notifications: false,
        sound: true,
        widgets: false,
        chosen: []
      }
    },
    computed: {

    },
    methods: {
      toggleItem(id) {
        this.$emit('toggleItem', {id: id, list: this.data.listName});
      },
      capitalize(name) {
        return name.charAt(0).toUpperCase() + name.slice(1);
      },
    },
    props: {
      items: Array,
      data: Object
    }
  }
</script>