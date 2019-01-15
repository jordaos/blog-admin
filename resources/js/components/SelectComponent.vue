<template>
<select class="form-control" v-bind:name="name" v-bind:id="id">
    <option value="">Selecione</option>
    <option v-for="(item, key) in items" :key="key" v-bind:value="getValue(item)" v-bind:selected="isSelectedItem(item)">{{ getText(item) }}</option>
</select>
</template>

<script>
export default {
    props: ["proptext", "propvalue", "name", "id", "items", "selected"],
    methods: {
        getText(item) {
            for(let prop in item)
                if (prop == this.proptext) return item[prop];
            return '';
        },
        getValue(item) {
            for(let prop in item)
                if (prop == this.propvalue) return item[prop];
            return '';
        },
        isSelectedItem(item) {
            return (this.selected[0] != undefined && item.id == this.selected[0].id);
        }
    }
}
</script>
