import { ToastGenerate } from "../shared/classes/ToastGenerate";
import { ToastTypeMessage } from "../shared/Constants/toast-type-message";
import { EssentialForm } from "../shared/classes/EssentialForm";
import { EssentialFormControl } from "../shared/classes/EssentialFormControl";
import { FormTypeRule } from "../shared/constants/form-type-rule";
import axios from "axios";
export default function setGlobalProperties(app) {
    app.config.globalProperties.$axios = axios;
    app.config.globalProperties.$toastGenerate = ToastGenerate;
    app.config.globalProperties.$toastTypeMessage = ToastTypeMessage;
    app.config.globalProperties.$modalBlur = {mask: {style: 'backdrop-filter: blur(5px)'}}

    app.config.globalProperties.$essentialForm = (controls) => new EssentialForm(controls);
    app.config.globalProperties.$essentialFormControl = (value, rules = []) => new EssentialFormControl(value, rules);
    app.config.globalProperties.$formTypeRule = FormTypeRule;
}