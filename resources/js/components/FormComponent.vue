<template>
<form class="" v-bind:action="action || ''" v-bind:method="defineMethod" enctype="multipart/form-data">
    <input v-if="token" type="hidden" name="_token" v-bind:value="token">
    <input v-if="alterMethod" type="hidden" name="_method" v-bind:value="alterMethod">

    <slot></slot>
</form>
</template>

<script>
export default {
    props: ['action', 'method', 'token'],
    data: function () {
        return {
            alterMethod: ''
        };
    },
    computed: {
        defineMethod: function () {
            if (this.method.toLowerCase() == "post" || this.method.toLowerCase() == "get") {
                return this.method.toLowerCase();
            } else if (this.method.toLowerCase() == "put" || this.method.toLowerCase() == "delete") {
                this.alterMethod = this.method.toLowerCase();
            }
            return "post";
        }
    }
}
</script>
