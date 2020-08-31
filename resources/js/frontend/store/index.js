import Vue from 'vue';
import Vuex from 'vuex'
import createPersistedState from 'vuex-persistedstate' 

import { promoter } from './modules/promoter'

Vue.use(Vuex);

const dataState = createPersistedState({
  paths: ['promoter']
})

export default new Vuex.Store({
  modules: {
    promoter
  },
  plugins: [dataState]
})