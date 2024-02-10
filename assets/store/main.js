import Vue from 'vue';

import Vuex from 'vuex';

import buildings from './building';
import marketings from './marketing';
import members from './members';

Vue.use(Vuex)

export default new Vuex.Store({
  state:{
    isLoading: false
  },
  getters:{
    getLoading(state){
      return state.isLoading
    }
  },
  mutations:{
    setLoading(state, newLoadingState){
      state.isLoading = newLoadingState
    }
  },
  actions:{
  },
  modules:{
    buildings,
    marketings,
    members,
  }
})