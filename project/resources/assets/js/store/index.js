import VueX from 'vuex';

const state = {
  messages: [],
  isSending: false
}

const getters = {
}

const actions = {
  sendMessage: ({ commit }) => commit('sendMessage'),
  broadCasting: ({ commit }) => commit('broadCasting')
}

const mutations = {
  sendMessage (state, messageObj) {
    state.messages.push(messageObj)
  },
  broadCasting (state, boolean) {
    state.isSending = boolean
  }
}


// A Vuex instance is created by combining the state, mutations, actions,
// and getters.
export default new VueX.Store({
  state,
  getters,
  actions,
  mutations
})
