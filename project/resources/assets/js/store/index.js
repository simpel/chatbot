import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

// root state object.
// each Vuex instance is just a single state tree.
const state = {
  messages: []
}

// getters are functions
const getters = {
}

const actions = {
  sendMessage: ({ commit }) => commit('sendMessage'),
}

const mutations = {
  sendMessage (state, messageObj) {
    state.messages.push(messageObj)
  }
}


// A Vuex instance is created by combining the state, mutations, actions,
// and getters.
export default new Vuex.Store({
  state,
  getters,
  actions,
  mutations
})
