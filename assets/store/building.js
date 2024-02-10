import axios from 'axios';

const state = () => ({
    buildings: [],
    isLoading: false,
    isCreating: false,
    isUpdating: false,
    error: null,
});

const getters = {
    getBuildings: state => state.buildings,
    isLoading: state => state.isLoading,
    isCreating: state => state.isCreating,
    isUpdating: state => state.isUpdating,
    error: state => state.error,
};

const actions = {
    async fetchAllBuildings({ commit, state }, query = null) {
        let url = "/buildings";

        commit('setLoading', true); 

        try {
        
            const response = await axios.get(url);
            const buildings = JSON.parse(response.data);
            //console.log(buildings)
            commit('setBuildings', buildings);
            commit('setError', null); 

        } catch (error) {
           
            commit('setError', error.message || 'An error occurred');
        } finally {
            commit('setLoading', false); 
        }
    }
};

const mutations = {
    setBuildings(state, payload) {
        //console.log(payload)
        state.buildings = payload;
    },
    setLoading(state, isLoading) {
        state.isLoading = isLoading;
    },
    setError(state, error) {
        state.error = error;
    },
};

export default {
    // namespaced: true,
    state,
    getters,
    actions,
    mutations,
};
