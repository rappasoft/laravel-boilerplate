<template>
  <div>
    <p>Default Layout...</p>
    <nav-menu :promoter='this.promoter'></nav-menu>
    <banner :promoter='this.promoter'></banner>
    <nav-bar></nav-bar>
    <div>
      <slot></slot>
    </div>
    <nav-footer :promoter_icon_big="promoter_icon_big" :promoter_icon_small="promoter_icon_small" :promoter_sponsors="promoter_sponsors" ></nav-footer>
  </div>
</template>

<script>
import NavMenu from "../includes/NavMenu";
import NavFooter from "../includes/NavFooter";

export default {
  components: {
    NavMenu,
    NavFooter
  },
  mounted() {
    this.promoter = this.$store.getters['promoter/getPromoter'];
  },  
  data() {
    return {
      promoter_icon_big: "https://images.squarespace-cdn.com/content/5f2bd4997fb806141875cbfe/1596760807361-EIZMIETQ4PTX0HB04L0F/logo-white.png?content-type=image%2Fpng",
      promoter_icon_small: "https://images.squarespace-cdn.com/content/v1/5f2bd4997fb806141875cbfe/1596760787304-RQJU0IFI6BZL1ZLCMCAU/ke17ZwdGBToddI8pDm48kL4WHpyV11Hlj8DNZYvV-QlZw-zPPgdn4jUwVcJE1ZvWEtT5uBSRWt4vQZAgTJucoTqqXjS3CfNDSuuf31e0tVHy0IL52BF-XbN49FOpzeAdBGvj3WDtjTREyTuuc_KD1Sb8BodarTVrzIWCp72ioWw/logo-negative.png",
      promoter_sponsors: [
        'https://picsum.photos/125/125/?image=58', 
        'https://picsum.photos/125/125/?image=59',
      ],
      promoter: null,
    };
  },
}
</script>