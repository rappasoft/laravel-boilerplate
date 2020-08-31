<template>
  <div>    
    <b-navbar toggleable="lg" type="light">
      <b-navbar-brand href="/">
				<img :src="promoter.logo" alt="Logo" width="40px">
			</b-navbar-brand>

      <b-navbar-toggle target="nav-collapse"></b-navbar-toggle>

      <b-collapse id="nav-collapse" is-nav>
        <!-- Right aligned nav items -->
        <b-navbar-nav class="ml-auto">
          <b-nav-form>
            <b-button size="sm" class="my-2 my-sm-0" @click="openSearchModal">
              <b-icon icon="search" scale="2"></b-icon>
            </b-button>
          </b-nav-form>

          <b-nav-item-dropdown :text="username" right v-if="auth">
            <b-dropdown-item href="#">TBC</b-dropdown-item>
            <b-dropdown-item href="#">TBC</b-dropdown-item>
            <b-dropdown-item href="#">TBC</b-dropdown-item>
            <b-dropdown-item href="#">TBC</b-dropdown-item>
            <b-dropdown-item @click="logout">Sign Out</b-dropdown-item>
          </b-nav-item-dropdown>
          <b-nav-item href="/login" right v-else>Login</b-nav-item>
        </b-navbar-nav>
      </b-collapse>
    </b-navbar>
  </div>
</template>

<script>
export default {
  mounted() {
    console.log("Nav Menu mounted.");
    this.$nextTick(function () {
      this.auth = localStorage.getItem('auth') == 'true' ? true : false;
      this.username = localStorage.getItem('username');
    })    
  },
  props: {
    promoter: Object
  },
  data() {
    return {
      user: null,
      auth: false,
      username: '',      
    };
  },
  methods: {
    logout(){
      localStorage.removeItem('access_token');
      localStorage.removeItem('auth');
      localStorage.removeItem('username');
      this.$router.go();
    },
    openSearchModal(){
      console.log('Open Search Modal');
    }
  },
};
</script>
