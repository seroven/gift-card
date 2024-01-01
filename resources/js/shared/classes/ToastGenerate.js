import { ToastsMessages } from "../Constants/toast-messages";
import store from '../../store/index';
export class ToastGenerate{

    constructor(){}
  
    static gen(typeMessage, delay = 0){
      const message = ToastsMessages.find(m => m.title == typeMessage);
      const toastBody = { severity: message?.severity, summary: message?.summary, detail: message?.detail, life: 4500, delay };
      store.commit('toast/show', toastBody);
    }
    
  }