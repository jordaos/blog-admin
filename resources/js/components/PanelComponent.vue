<template>
<div class="card card-default" v-bind:class="defineBorderColor">
    <div class="card-header" v-bind:class="defineBgAndColor">{{ title }}</div>

    <div class="card-body">
        <slot></slot>
    </div>
</div>
</template>

<script>
export default {
    props: ["title", "color"],
    computed: {
        defineBgAndColor: function () {
            let bg = "bg-" + (this.color || "light");
            let text = "text-" + ((!this.color || this.color == "light") ? "dark" : "light");
            return bg + " " + text;
        },
        defineBorderColor: function () {
            return "border-" + (this.color || "light");
        }
    }
};
</script>