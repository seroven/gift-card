import { createStore } from "vuex";
import toast from "./modules/toast";


const store = createStore({
    namespaced:true,
    modules: {
        toast,
    }
})

export default store;