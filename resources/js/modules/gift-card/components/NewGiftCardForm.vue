<template>
    <Dialog header="Generar una Gift Card" v-model:visible="visible" modal :pt="this.$modalBlur"
        :breakpoints="{ '2560px': '35vw', '1800px': '50vw', '1200px': '65vw', '980px': '80vw', '560px': '100vw' }"
        :closable="false" :draggable="false">

        <div class="grid">

            <FormGroup label="Código" :control="formGiftCard.controls.code" customClass="col-12 md:col-6">
                <InputText v-model="formGiftCard.controls.code.value" disabled
                    :class="formGiftCard.controls.code.getClass()" />
            </FormGroup>

            <FormGroup label="Persona" :control="formGiftCard.controls.name" customClass="col-12 md:col-6">
                <InputText v-model="formGiftCard.controls.name.value" :class="formGiftCard.controls.name.getClass()" />
            </FormGroup>

            <FormGroup label="Monto" :control="formGiftCard.controls.mount" customClass="col-12 md:col-6">
                <InputNumber v-model="formGiftCard.controls.mount.value" mode="currency" currency="PEN" locale="es-PE"
                    :class="formGiftCard.controls.mount.getClass()" :minFractionDigits="2" />
            </FormGroup>

            <FormGroup label="Correo" :control="formGiftCard.controls.email" customClass="col-12 md:col-6">
                <InputText v-model="formGiftCard.controls.email.value" :class="formGiftCard.controls.email.getClass()"/>
            </FormGroup>

            <FormGroup label="Fecha de Emisión" :control="formGiftCard.controls.dateIssue" customClass="col-12 md:col-6">
                <Calendar v-model="formGiftCard.controls.dateIssue.value" dateFormat="yy/mm/dd"
                    :class="formGiftCard.controls.dateIssue.getClass()" showIcon disabled />
            </FormGroup>

            <FormGroup label="Fecha de Expiración" :control="formGiftCard.controls.dateExpired"
                customClass="col-12 md:col-6">
                <Calendar v-model="formGiftCard.controls.dateExpired.value" dateFormat="yy/mm/dd" :minDate="new Date()"
                    :class="formGiftCard.controls.dateExpired.getClass()" showIcon />
            </FormGroup>

            <FormGroup label="Estado" :control="formGiftCard.controls.status" customClass="col-12 md:col-6">
                <Dropdown v-model="formGiftCard.controls.status.value" :options="status" optionLabel="description"
                    :class="`w-full-important ${formGiftCard.controls.status.getClass()}`" disabled/>
            </FormGroup>
        </div>
        <div class="w-full flex justify-content-between mt-2">
            <Button label="Cancelar" severity="secondary" icon="pi pi-times" @click="closeModal" />
            <Button label="Guardar" severity="success" icon="pi pi-check" @click="submit" />
        </div>

    </Dialog>
</template>
<script>

export default {
    emits: ['closeModal', 'onSaveUser'],
    props: {
        visible: Boolean,
    },
    data() {
        return {
            formGiftCard: this.$essentialForm({
                code: this.$essentialFormControl(null, [this.$formTypeRule.REQUIRED]),
                name: this.$essentialFormControl(null, [this.$formTypeRule.REQUIRED]),
                mount: this.$essentialFormControl(null, [this.$formTypeRule.REQUIRED]),
                email: this.$essentialFormControl(null, [this.$formTypeRule.REQUIRED, this.$formTypeRule.EMAIL]),
                dateIssue: this.$essentialFormControl(new Date(), [this.$formTypeRule.REQUIRED]),
                dateExpired: this.$essentialFormControl(null, [this.$formTypeRule.REQUIRED]),
                status: this.$essentialFormControl(null, [this.$formTypeRule.REQUIRED]),
            }),
            status: [],
            loading: false
        }
    },
    watch: {
        visible() {
            this.generateCode();
            this.formGiftCard.controls.dateIssue.value = new Date();
        },

    },
    created() {
        this.formGiftCard.applyWatchers(this);
        this.loadStatus();

    },
    methods: {
        closeModal() {

            this.$emit('closeModal');
            this.formGiftCard.reset();
        },
        loadStatus() {
            this.$axios.get('/api/status/all').then(response => {
                this.status = response.data;
                this.formGiftCard.controls.status.value = this.status.find(s => s.keycode == 'vigente');
            })
        },
        generateCode() {
            this.$axios.get('/api/gift-card/generateCode').then(response => {
                this.formGiftCard.controls.code.value = response.data.data;
            })
        },
        formatDateTime(date) {
            return date.toISOString().slice(0, 19).replace("T", " ");
        },
        submit() {
            if (!this.formGiftCard.validateAll()) {
                this.$toastGenerate.gen(this.$toastTypeMessage.FORM_ERROR);
                return;
            }
            this.loading = true;
            this.$axios.post('/api/gift-card/create',
                {
                    ...this.formGiftCard.value(),
                    idStatus: this.formGiftCard.controls.status.value.id,
                    dateIssue: this.formatDateTime(this.formGiftCard.controls.dateIssue.value),
                    dateExpired: this.formatDateTime(this.formGiftCard.controls.dateExpired.value),
                }
            ).then(response => {
                this.loading = false;
                this.$emit('onSaveUser');
                this.formGiftCard.controls.code.value = response.data.data;
            })
        }
    }
}
</script>