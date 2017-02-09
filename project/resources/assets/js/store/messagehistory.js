import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

export default new Vuex.Store({
    state: {
        messages: []
    },
    mutations: {
        ADD_MESSAGE(state){
            state.messages.push({
                body: 'hejhej',
                part: 'human',
                type: 'text'
            })
        }
    },
    actions: {
        addMessage({commit}){
            commit('ADD_MESSAGE')
        }
    },
    getters: {
        messages: state => {
            return state.messages;
        }
    }

})