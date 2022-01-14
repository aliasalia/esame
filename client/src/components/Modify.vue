<template>
    <div class= "flex flex-col items-center mt-7">
        <h1 class="mb-5 text-lg">Insert a new Field</h1>
        <label for="">Comune <input type="text" v-model="field.comune"></label>
        <label for="">Foto area <input type="text" v-model="field.img"></label>
        <label for="">Dimensioni <input type="number" v-model="field.dimensione"> ettari</label>
        <label for="">Foglio catastale <input type="text" v-model="field.foglio_catastale"></label>
        <label for="">Mappale catastale <input type="text" v-model="field.mappale_catastale"></label>
        <label for="">Parcella catastale <input type="text" v-model="field.parcella_catastale"></label>
        <label for="">Tipologia di terreno
            <select name="tipot" id="tipot" v-model="field.tipo_terreno">
                <option value="argilloso">argilloso</option>
                <option value="sabbioso">sabbioso</option>
                <option value="ghiaioso">ghiaioso</option>
                <option value="tufo">tufo</option>
            </select>
        </label>
        <label for="">Tipodi irrigazione
            <select name="tipoi" id="tipoi" v-model="field.tipo_irrigazione">
                <option value="a scorrimento">a scorrimento</option>
                <option value="pozzo">pozzo</option>
                <option value="canale">canale</option>
                <option value="senz'acqua">senz'acqua</option>
            </select>
        </label>
        <label for="">Tipo di offerta
            <select name="tipoo" id="tipoo" v-model="field.tipo_offerta">
                <option value="vendita">vendita</option>
                <option value="affitto">affitto</option>
                <option value="affido gratuito">affido gratuito</option>
            </select>
        </label>
        <label for="">canone offerta <input type="number" v-model="field.canone"> €</label>
        <label for="">Disponibile da subito <input type="checkbox" v-model="field.disponibilita"></label>
        <button :disabled="!isValid()" @click="modify()" class="bg-emerald-200 rounded-md px-3 mt-7">Modify</button>
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
                dimensione: 100,
                foglio_catastale: "",
                mappale_catastale: "",
                parcella_catastale: "",
                tipo_terreno: "",
                tipo_irrigazione: "",
                tipo_offerta: "",
                canone: 1000,
                disponibilita: false
            }
        }
    },
    async mounted() {
        let id = this.$route.params.id;
        let res = await axios.get("http://localhost:8000/api/fields/" +id)
        this.field = res.data;
    },
    methods: {
        async modify() {
            let id = this.$route.params.id;
            await axios.put("http://localhost:8000/api/fields/" +id, this.field);
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