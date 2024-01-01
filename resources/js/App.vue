<template>
    <Toast position="top-left" />
    <router-view></router-view>
</template>

<script>
import setLocaleES from "../js/config/primevue.config";

export default {
    setup() {
        setLocaleES();
    },
    watch: {
        '$store.state.toast.body': function (body) {
            setTimeout(() => {
                this.$toast.add(body)
            }, body.delay)
        }
    }
};
</script>
