<x-layout bodyClass="bg-gray-200">
  <div class="container position-sticky z-index-sticky top-0">
      <div class="row">
          <div class="col-12">
              <!-- Navbar -->
              <x-navbars.navs.guest signin='login' signup='register'></x-navbars.navs.guest>
              <!-- End Navbar -->
          </div>
      </div>
  </div>
  <div class="page-header justify-content-center min-vh-100"
      style="background-image: url('https://images.unsplash.com/photo-1497294815431-9365093b7331?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1950&q=80');">
      <span class="mask bg-gradient-dark opacity-6"></span>
      <div class="container text-center">
          <div class="row">
              <div class="col-md-12">
                <h1 class="title text-light">403</h1>
                <h2 class="text-light">Forbidden </h2>
                <h4 class="text-light">Ooooups! Looks like you got lost.</h4>
              </div>
            </div>
      </div>
  </div>
      <x-footers.guest></x-footers.guest>
</x-layout>