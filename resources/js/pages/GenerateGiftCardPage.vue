<template>
    <div
        class="w-screen h-screen flex justify-content-center align-items-center"
    >
        <div class="flex flex-column w-18rem">
            <div class="flex flex-column">
                <span class="font-bold text-lg">Title</span>
                <InputText v-model="data.title" />
            </div>
            <div class="w-full mt-3">
                <Button label="Generate" class="w-full" @click="generatePdf" />
            </div>
        </div>
    </div>
</template>
<script>
import axios from "axios";

export default {
    data() {
        return {
            data: {
                title: ""
            },
        };
    },
    methods: {
        generatePdf(){
            // console.log(`http://127.0.0.1:8000/pdf?${this.generateParams()}`);
            window.open(`http://127.0.0.1:8000/pdf?${this.generateParams()}`) 
            // const params = {
            //     data: this.data
            // };
            // axios.get('/pdf', {params});

        },
        generateParams(){
            const params = [];
            for (let key in this.data){
                params.push(`${key}=${this.data[key]}`);
            }
            return params.join('&');
        }
    }
};
</script>
