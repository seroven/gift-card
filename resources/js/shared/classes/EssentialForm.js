
export class EssentialForm {


    constructor(controls) {
        this.controls = controls; // Un arreglo de EssentialFormControl
    }

    applyWatchers(context) {
        Object.keys(this.controls).forEach((key) => {
            context.$watch(() => this.controls[key].value, () => {
                // Validar el control cuando cambia su propiedad 'value'
                this.controls[key].validate(this.evaluateError);
            });
        });
    }

    // False = Error
    // True = Todo OK
    validateAll() {
        let isFine = true;
        for (const key of Object.keys(this.controls)) {
            if (!this.controls[key].validate()) {
                isFine = false;
            }
        }
        return isFine;
    }

    reset() {
        for (const key of Object.keys(this.controls)) {
            this.controls[key].clear();
        }
    }

    value() {
        const controlsValue = {}
        Object.keys(this.controls).forEach(k => {
            controlsValue[k] = this.controls[k].value
        });
        return controlsValue;
    }

    matchValue(controls) {
        Object.keys(controls).forEach(k => {
            this.controls[k].value = controls[k];
        });
    }



}