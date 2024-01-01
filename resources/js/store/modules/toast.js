import { createStore } from "vuex";

const toast = {
    namespaced: true,
    state: {
        body: null
    },
    actions: {

    },
    mutations: {
        show(state, body){
            state.body = body;
        }
    },
    getters: {

    }
}

export default toast;