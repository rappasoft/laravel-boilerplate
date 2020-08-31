<template>
  <div>
    <b-container fluid no-gutters class="mb-2" v-if="promoter">
      <b-row>
        <video-background
          :src="promoter.featured_image"
          style="max-height: 450px; height: 100vh;"
          overlay="linear-gradient(45deg,#2a4ae430,#fb949e6b)"
          :poster="promoter.thumbnail"
        >
        </video-background>
      </b-row>
    </b-container>
    <b-container fluid no-gutters class="mb-2" v-if="banner">
      <b-row>
        <b-img :src="banner" alt="banner"></b-img>        
      </b-row>
    </b-container>
  </div>  
</template>

<script>
export default {
  mounted() {
    console.log("Banner mounted.");
  },  
  props: {
    promoter: Object,
    banner: Object    
  }
}
</script>