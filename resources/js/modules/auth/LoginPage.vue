<template>
    <div class="w-full flex flex-column align-items-center">
        <span class="text-2xl font-bold">Inicio de Sesión</span>
        <FormGroup label="Correo" :control="formAuth.controls.email" customClass="w-full mt-5 mb-4">
            <InputText v-model="formAuth.controls.email.value" :class="formAuth.controls.email.getClass()" />
        </FormGroup>
        <FormGroup label="Contraseña" :control="formAuth.controls.password" customClass="w-full mb-5">
            <Password v-model="formAuth.controls.password.value" toggleMask class="w-full display-grid-important" :feedback="false"/>
        </FormGroup>

        <Button label="Ingresar" class="w-full" @click="submit" :loading="loading" />

    </div>
</template>
<script>
import axios from 'axios';
export default {
    data() {
        return {
            formAuth: this.$essentialForm({
                email: this.$essentialFormControl(null, [this.$formTypeRule.REQUIRED, this.$formTypeRule.EMAIL]),
                password: this.$essentialFormControl(null, [this.$formTypeRule.REQUIRED]),
            }),
            loading: false
        }
    },
    created() {
        this.formAuth.applyWatchers(this);
    },
    methods: {
        submit() {
            if (!this.formAuth.validateAll()) {
                this.$toastGenerate.gen(this.$toastTypeMessage.FORM_ERROR);
                return;
            }
            this.loading = true;
            axios.post('/api/auth', this.formAuth.value()).then(response => {
                this.loading = false;
                const data = response.data;

                switch (data.code) {
                    case 200:
                        localStorage.setItem('token', data.data);
                        this.$router.push({ name: 'GiftCard' });
                        break;
                    case 403:
                        this.$router.push({ name: '403' });
                        break;
                    case 404:
                        this.$router.push({ name: '404' });
                        break;
                }
            })

        }
    }
}
</script>