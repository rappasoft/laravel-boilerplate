export const promoter = {
  namespaced: true,
  state: {      
    promoter: {},
  },
  getters: {
    getPromoter (state) {
      return state.promoter
    }
  },
  mutations: {
    updatePromoter (state, promoter) {
      state.promoter = promoter;
    }
  },
  actions: {
    storePromoter (context, promoter) {
      context.commit('updatePromoter', promoter)
    }
  }
}