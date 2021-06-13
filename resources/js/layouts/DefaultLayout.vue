<template>
  <v-app>
    <div class="DefaultLayout">
      <app-bar></app-bar>
      <main class="DefaultLayout__main">
        <slot/>
      </main>
      <footer class="DefaultLayout__footer">
        &copy; StarWars Films
      </footer>
    </div>
  </v-app>
</template>