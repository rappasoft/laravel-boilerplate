<template>
  <div>
    <b-container fluid no-gutter class="bg-dark">
      <b-navbar toggleable="lg" type="light">
        <b-navbar-brand v-for="link in links" :key=link.path :href="link.path">{{ link.label }}</b-navbar-brand>
      </b-navbar>
    </b-container>    
  </div>
</template>

<script>
export default {
  mounted() {
    console.log("Nav Bar mounted.");    
  },
  props: {
    
  },
  data() {
    return {
      links: [
        { label: "CHANNEL", path: "/channel" },
        { label: "LIVE EVENTS", path: "/live" },
        { label: "FEATURE FILMS", path: "/vod" },
        { label: "RECIPES", path: "/recipe" },
        { label: "MEAL PLANS", path: "/mealplan" },
        { label: "POD CASTS", path: "/podcasts"},
        { label: "INTERVIEWS", path: "/qna"},
        { label: "HIGHLIGHTS", path: "/highlights"},
      ]
    };
  },
  methods: {
    
  },
};
</script>
