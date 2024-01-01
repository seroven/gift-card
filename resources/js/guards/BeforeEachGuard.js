import { TokenManagment } from "../shared/classes/TokenManagment";
import { ToastGenerate } from "../shared/classes/ToastGenerate";
import { ToastTypeMessage } from "../shared/constants/toast-type-message";

export default async (to, from, next) => {
    if (to.path.includes("auth") && TokenManagment.existToken()) {
        ToastGenerate.gen(ToastTypeMessage.ALREADY_AUTHENTICATED);
        next({ name: "GiftCard" });
        return;
    }

    if (to.path.includes("panel") ) {

        if (!TokenManagment.existToken()){
            ToastGenerate.gen(ToastTypeMessage.USER_NOT_LOGGED);
            TokenManagment.clear();
            next({ name: "Login" });
            return;
        }

        if (!TokenManagment.verifyValidateToken()) {
            ToastGenerate.gen(ToastTypeMessage.TOKEN_EXPIRED_OR_INVALID);
            TokenManagment.clear();
            next({ name: "Login" });
            return;
        }
    }


    next();
};
