<template>
    <div class="flex flex-col items-center mt-10">
        <div class="mb-5">
            <button
            class="px-2 rounded-sm mr-5 hover:bg-emerald-200"
            :class="{
                'bg-emerald-300': sort == 'desc',
                'border-emerald-300 border-2': sort != 'desc'
            }"
            @click="sortF('desc')">
                biggest ⇡
            </button>
            <button
            class="px-2 rounded-sm hover:bg-emerald-200"
            :class="{
                'bg-emerald-300': sort == 'asc',
                'border-emerald-300 border-2': sort != 'asc'
            }"
            @click="sortF('asc')">
                smallest ⇣
            </button>
        </div>
        <div v-for="field in fields" :key="field.id">
            <div class="flex bg-emerald-200 mb-3 pl-3 py-3 rounded-sm w-96">
                <div>
                    <img :src="field.img" :alt="field.img" class="w-40">
                </div>
                <div class="mx-4">
                    {{field.comune}}
                    <p class="text-gray-800">{{field.dimensione}} ettari</p>
                    <p v-if="field.disponibilita == true" class="text-gray-800 text-sm">Disponibile da subito!</p>
                </div>
            </div>
            <div class="flex mt-2 mb-7 justify-between">
                <button class="border-emerald-300 border-2 rounded-sm px-3 py-1 text-center text-sm hover:bg-emerald-300" @click="del(field.id)">Delete ×</button>
                <button class="border-emerald-300 border-2 rounded-sm px-3 py-1 text-center text-sm hover:bg-emerald-300" @click="toMod(field.id)">Modify ⁂</button>
                <button class="border-emerald-300 border-2 rounded-sm px-3 py-1 text-center text-sm hover:bg-emerald-300" @click="toView(field.id)">View ⋙</button>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios'
export default {
    name: 'List',
    data() {
        return {
            fields: [],
            sort: 'asc'
        }
    },
    async mounted() {
        await this.getFields();
    },
    methods: {
        async getFields() {
            let resp = await axios.get("http://localhost:8000/api/fields?sort=" + this.sort);
            console.log(resp.status);
            console.log(resp.data);
            this.fields = resp.data;
        },
        sortF(order) {
            if (this.sort != order) {
                this.sort = order;
                this.getFields();
            }
        },
        toMod(id) {
            this.$router.push("/modify/"+ id);
        },
        toView(id) {
            this.$router.push("/detail/"+ id);
        },
        del(id) {
            let res = axios.delete("http://localhost:8000/api/fields/" + id);
            console.log(res.status);
            console.log(res.data);
            this.getFields();
        },
    }
}
</script>

<style>

</style>