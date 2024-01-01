import { FormTypeRule } from "./form-type-rule";

export const FormRules = [
    {
        name: FormTypeRule.REQUIRED,
        message: 'Este campo es requerido',
        regex: /^[^ ](.|\n)*$/
    },
    {
        name: FormTypeRule.EMAIL,
        message: 'Este correo no es válido',
        regex: /^[a-zA-Z0-9\._-]+@[a-zA-Z0-9\._-]+(\.[a-zA-Z]{2,10})+$/
    },
    {
        name: FormTypeRule.ONLY_LETTERS,
        message: 'Este campo solo acepta letras',
        regex: /^[a-zA-Z ÁÉÍÓÚáéíóú]+$/
    },
    {
        name: FormTypeRule.ONLY_LETTERS,
        message: 'Este campo solo acepta números',
        regex: /^[0-9]+$/
    },
]