<template>
    <div class="flex flex-col">
        <div class="flex justify-center m-auto mt-10 bg-emerald-200 mb-3 pl-3 py-3 rounded-sm">
                <div>
                    <img :src="field.img" :alt="field.img" class="h-60">
                </div>
                <div class="mx-4">
                    <p>comune: {{field.comune}}</p>
                    <p class="text-gray-800">{{field.dimensione}} ettari</p>
                    <p>foglio catastale: {{field.foglio_catastale}}</p>
                    <p>mappale catastale: {{field.mappale_catastale}}</p>
                    <p>parcella catastale: {{field.parcella_catastale}}</p>
                    <p>tipologia di terreno: {{field.tipo_terreno}}</p>
                    <p>tipo di irrigazione: {{field.tipo_irrigazione}}</p>
                    <p>tipo di offerta{{field.tipo_offerta}}</p>
                    <p>canone offerta: {{field.canone}}</p>
                    <p v-if="field.disponibilita == true" class="text-gray-800 text-sm">Disponibile da subito!</p>
                </div>
        </div>
        <div class="flex justify-center">
            <button class="border-emerald-300 border-2 rounded-sm px-3 py-1 mr-3 text-center fit-content" @click="back()">Back</button>
        </div>
    </div>
</template>

<script>
import axios from 'axios'
export default {
    name: 'Detail',
    data() {
        return {
            field: {},
        }
    },
    async mounted() {
        let id = this.$route.params.id;
        let res = await axios.get('http://localhost:8000/api/fields/'+ id);
        console.log(res.status);
        console.log(res.data);
        this.field = res.data;
    },
    methods: {
        back() {
            this.$router.push("/");
        }
    }
}
</script>

<style>

</style>