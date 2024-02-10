import axios from 'axios';

const state = () => ({
    marketings: [],
});

const getters = {
    getMarketings: state => state.marketings,
};

const actions = {
    async fetchAllMarketings({ commit, state }, query = null) {

        let url = "/marketings"; 

        try {
        
            const response = await axios.get(url);
            const marketings = JSON.parse(response.data);
            //console.log(marketings)
            commit('setMarketings', marketings);

        } catch (error) {
           console.log('error marketing  fetch')
        } 
    }
};

const mutations = {
    setMarketings(state, payload) {
        //console.log(payload)
        state.marketings = payload;
    }
};

export default {
    // namespaced: true,
    state,
    getters,
    actions,
    mutations,
};
