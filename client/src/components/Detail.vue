<template>
    <div class="flex flex-col">
        <div class="flex flex-col justify-center m-auto mt-3 border-emerald-200 border-4 border-dotted mb-3 py-3 px-6 rounded-sm">
            <div>
                <img :src="field.img" :alt="field.img" class="w-96">
            </div>
            <div class="mx-4 my-4">
                <p>comune: <span class="text-gray-800">{{field.comune}}</span></p>
                <p>dimensione: <span class="text-gray-800">{{field.dimensione}}</span> ettari</p>
                <p>foglio catastale: <span class="text-gray-800">{{field.foglio_catastale}}</span></p>
                <p>mappale catastale: <span class="text-gray-800">{{field.mappale_catastale}}</span></p>
                <p>parcella catastale: <span class="text-gray-800">{{field.parcella_catastale}}</span></p>
                <p>tipologia di terreno: <span class="text-gray-800">{{field.tipo_terreno}}</span></p>
                <p>tipo di irrigazione: <span class="text-gray-800">{{field.tipo_irrigazione}}</span></p>
                <p>tipo di offerta: <span class="text-gray-800">{{field.tipo_offerta}}</span></p>
                <p>canone offerta: <span class="text-gray-800">{{field.canone}} €</span></p>
                <p v-if="field.disponibilita == true" class="text-gray-800">Disponibile da subito!</p>
            </div>
        </div>
        <div class="flex justify-center">
            <button class="border-emerald-300 border-2 rounded-sm px-3 py-1 mr-3 text-center hover:cursor-pointer hover:bg-emerald-300" @click="back()">⋘ Back</button>
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