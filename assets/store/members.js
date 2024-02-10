import axios from 'axios';

const state = () => ({
    members: [],
    createdData : null,
    isCreatingMember : false
});

const getters = {
    getMembers: state => state.members,
    createdData: state => state.createdData,
    getIsCreatingMember: state => state.isCreatingMember
};

const actions = {
    async fetchAllMembers({ commit, state }, query = null) {

        let url = "/members"; 

        try {
        
            const response = await axios.get(url);
            const members = JSON.parse(response.data);
            //console.log(members)
            commit('setMembers', members);

        } catch (error) {
           console.log('error marketing  fetch')
        } 
    },
    async storeMember({ dispatch, commit }, member) {
        //console.log(member)
        commit('setIsMemberCreatingLoading', true)
        await axios.post(`members/create`, member)

            .then(res => {
                commit('saveNewMembers', res.data.data);
                dispatch('fetchAllMembers')
                commit('setIsMemberCreatingLoading', false)
            })
            .catch(err => {
                console.log('error', err);
            })
            
    },
};

const mutations = {
    setMembers(state, payload) {
        //console.log(payload)
        state.members = payload;
    },
    saveNewMembers: (state, payload) => {
        state.createdData = payload;
    },
    setIsMemberCreatingLoading(state, payload) {
        //console.log(payload)
        state.isCreatingMember = payload;
    }
};

export default {
    // namespaced: true,
    state,
    getters,
    actions,
    mutations,
};
