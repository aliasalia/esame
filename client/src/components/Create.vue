<template>
    <div class= "flex flex-col items-center mt-7">
        <h1 class="mb-5 text-lg">Insert a new Field</h1>
        <div class="flex flex-col">
            <label for="" class="mt-3">Comune <input type="text" v-model="field.comune" class="ml-5 border-emerald-200 border-2 rounded-sm"></label>
            <label for="" class="mt-3">Foto area <input type="text" v-model="field.img" class="ml-5 border-emerald-200 border-2 rounded-sm"></label>
            <label for="" class="mt-3">Dimensioni <input type="number" v-model="field.dimensione" class="ml-5 border-emerald-200 border-2 rounded-sm"> ettari</label>
            <label for="" class="mt-3">Foglio catastale <input type="text" v-model="field.foglio_catastale" class="ml-5 border-emerald-200 border-2 rounded-sm"></label>
            <label for="" class="mt-3">Mappale catastale <input type="text" v-model="field.mappale_catastale" class="ml-5 border-emerald-200 border-2 rounded-sm"></label>
            <label for="" class="mt-3">Parcella catastale <input type="text" v-model="field.parcella_catastale" class="ml-5 border-emerald-200 border-2 rounded-sm"></label>
            <label for="" class="mt-3">Tipologia di terreno
                <select name="tipot" id="tipot" v-model="field.tipo_terreno" class="ml-5 border-emerald-200 border-2 rounded-sm">
                    <option value="argilloso">argilloso</option>
                    <option value="sabbioso">sabbioso</option>
                    <option value="ghiaioso">ghiaioso</option>
                    <option value="tufo">tufo</option>
                </select>
            </label>
            <label for="" class="mt-3">Tipo di irrigazione
                <select name="tipoi" id="tipoi" v-model="field.tipo_irrigazione" class="ml-5 border-emerald-200 border-2 rounded-sm">
                    <option value="a scorrimento">a scorrimento</option>
                    <option value="pozzo">pozzo</option>
                    <option value="canale">canale</option>
                    <option value="senz'acqua">senz'acqua</option>
                </select>
            </label>
            <label for="" class="mt-3">Tipo di offerta
                <select name="tipoo" id="tipoo" v-model="field.tipo_offerta" class="ml-5 border-emerald-200 border-2 rounded-sm">
                    <option value="vendita">vendita</option>
                    <option value="affitto">affitto</option>
                    <option value="affido gratuito">affido gratuito</option>
                </select>
            </label>
            <label for="" class="mt-3">canone offerta <input type="number" v-model="field.canone" class="ml-5 border-emerald-200 border-2 rounded-sm"> €</label>
            <label for="" class="mt-3">Disponibile da subito <input type="checkbox" v-model="field.disponibilita" class="ml-5 border-emerald-200 border-2 rounded-sm"></label>
        </div>
        <button :disabled="!isValid()" @click="create()" class="bg-emerald-200 rounded-md px-3 mt-7">Create</button>
        <div v-if="!isValid()"><p>Some fields are not completed</p></div>
    </div>
</template>

<script>
import axios from 'axios';
export default {
    name: 'Create',
    data() {
        return {
            field: {
                comune: "",
                img: "",
                dimensione: 0,
                foglio_catastale: "",
                mappale_catastale: "",
                parcella_catastale: "",
                tipo_terreno: "",
                tipo_irrigazione: "",
                tipo_offerta: "",
                canone: 0,
                disponibilita: false
            }
        }
    },
    methods: {
        async create() {
            await axios.post("http://localhost:8000/api/fields", this.field);
            console.log(this.field);
            this.$router.push("/");
        },
        isValid() {
            return(
                this.field.comune != "" &&
                this.field.img != "" &&
                this.field.dimensione != 0 &&
                this.field.foglio_catastale != "" &&
                this.field.mappale_catastale != "" &&
                this.field.parcella_catastale != "" &&
                this.field.tipo_terreno != "" &&
                this.field.tipo_irrigazione != "" &&
                this.field.tipo_offerta != "" &&
                this.field.canone != 0
            );
        }
    }
}
</script>

<style>

</style>