import { FormRules } from "../constants/form-rules";

export class EssentialFormControl {

    existError = false;
    error = null;


    constructor(value, rules = []) {
        this.value = value;
        this.rules = rules;
    }

    // False = Error
    // True = Todo OK
    validate() {
        for (const ruleName of this.rules) {
            const rule = FormRules.find(fr => fr.name == ruleName);
            if (!rule.regex.test(this.value) || !this.value) {
                this.existError = true;
                this.error = rule;
                return false;
            }
        }
        this.existError = false;
        this.error = null;
        return true;
    }

    getClass() {
        return this.existError ? 'p-invalid' : '';
    }

    clear(){
        this.value = null;
        setTimeout(() => {
            this.existError = false;
            this.error = null;
        }, 100)
    }

}