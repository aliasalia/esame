<template>
    <div id="nav" class="bg-emerald-200 px-6 py-5 flex">
        <div class="hover:cursor-pointer text-lg grow hover:font-bold hover:text-white" @click="toList()">TreeBu</div>
        <div class="hover:cursor-pointer text-lg hover:font-bold hover:text-white" @click="toCreate()">new field</div>
    </div>
</template>

<script>
export default {
    name: 'Navigation',
    methods: {
        toList() {
            this.$router.push("/");
        },

        toCreate() {
            this.$router.push("/create");
        }
    }
}
</script>

<style>

</style>