<template>  
  <div>
    <b-container fluid no-gutter class="border-0" style="background-color: #85754e; padding-top: 30px; padding-bottom: 30px;">
    </b-container>
    <b-container fluid no-gutter class="bg-dark">
      <b-row>
        <b-col>
          <b-card class= "bg-dark border-0">
            <img :src="promoter_icon_small" alt="Logo" width="40px"/>
          </b-card>
        </b-col>        
      </b-row>
    
      <b-row>
        <b-col class="col-8">
          <b-row>
            <b-col class="col-4" v-for="footer in footers" :key=footer.title>
              <b-card class= "bg-dark text-white border-0">
                <b-card-title>{{ footer.title }}</b-card-title>
                <b-list-group
                  v-for="item in footer.items"
                  :key="item"
                >
                  <b-list-group-item href="#" class= "bg-dark text-white border-0" style="padding-left: 0;">{{ item }}</b-list-group-item>        
                </b-list-group>
              </b-card>
            </b-col>

            <b-col class="col-4">
              <b-card class= "bg-dark text-white border-0">
                <b-card-title>OUR SPONSORS</b-card-title>        
                <b-img v-for="sponsor in promoter_sponsors" :key="sponsor" :src="sponsor" :alt="sponsor" rounded block width="40px"/>
              </b-card>
            </b-col>
          </b-row>

          <b-row>
              <b-button
              v-for="icon in icons" :key="icon"
              class="mx-4 white--text"
              icon
            >
                <b-icon class="border rounded" size="24px">{{ icon }}</b-icon>
            </b-button>
          </b-row>
        </b-col>

        <b-col class="col-4">
          <b-card class= "bg-dark border-0">
            <img :src="promoter_icon_big" alt="Logo" width="120px"/>
          </b-card>
        </b-col>  
      </b-row>
      
      <b-row>
        <b-col class="col-12">
          <b-card class="bg-dark border-0"></b-card>
        </b-col>        
      </b-row>

    </b-container>
  <!-- <b-footer-card>
        <b-divider></b-divider>        
          
    </b-footer-card> -->
  </div>
</template>

<script>
export default {
  mounted() {
    console.log("Nav Footer mounted.");
  },
  props: {
    promoter_icon_big: String,
    promoter_icon_small: String,
    promoter_sponsors: Array,
  },
  data() {
    return {
      icons:[
        'fab fa-facebook',
        'fab fa-twitter',        
        'fab fa-instagram',
      ],
      footers:[
        {
          title: "WATCH",
          items: ["Live Event", "24/7 channels", "Video on Demand"]
        },
        {
          title: "EXPLORE",
          items: ["Our services", "News", "Contact us"]
        },
      ],
    };
  },
  methods: {},
};
</script>
