<template>
    <div class="w-screen h-screen flex">
        <div class="flex-1 flex justify-content-center align-items-center relative form-container">

            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"
                class="absolute left-0 right-0 bottom-0 opacity-70">
                <path fill="#f9bfb3" fill-opacity="1"
                    d="M0,96L60,85.3C120,75,240,53,360,90.7C480,128,600,224,720,218.7C840,213,960,107,1080,69.3C1200,32,1320,64,1380,80L1440,96L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z"
                    data-darkreader-inline-fill="" style="--darkreader-inline-fill: #f9bfb3;"></path>
            </svg>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"
                class="absolute left-0 right-0 bottom-0 opacity-80">
                <path fill="#f9bfb3" fill-opacity="1"
                    d="M0,128L60,149.3C120,171,240,213,360,192C480,171,600,85,720,85.3C840,85,960,171,1080,186.7C1200,203,1320,149,1380,122.7L1440,96L1440,320L1380,320C1320,320,1200,320,1080,320C960,320,840,320,720,320C600,320,480,320,360,320C240,320,120,320,60,320L0,320Z"
                    data-darkreader-inline-fill="" style="--darkreader-inline-fill: #f9bfb3;"></path>
            </svg>
            <div class="surface-card p-4 shadow-2 border-round w-full sm:w-30rem z-1">
                <router-view></router-view>
            </div>
        </div>
        <div class="flex-1 hidden xl:block p-0">
            <div class="h-full w-full relative background-image">
                <div class="absolute bottom-0 top-0 left-0 right-0 background-color-image"></div>
                <div
                    class="absolute bottom-0 top-0 left-0 right-0 flex flex-column justify-content-center align-items-center">
                    <div class="font-semibold text-white text-6xl">
                        SkincareSpa
                    </div>
                    <div class="text-white text-4xl">
                        Plataforma de Creación de Gift Cards
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
</script>
<style scoped>
.background-color-image {
    background-color: #f9bfb3;
    opacity: 0.5;
}

.background-image {
    background: url('../../assets/images/image-auth-layout.jpg');
    background-repeat: repeat-x;
    background-size: cover;
    background-position-x: center;
}
</style>