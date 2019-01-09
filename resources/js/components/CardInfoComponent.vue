<template>
<div class="card card-default" v-bind:class="defineColor">
    <div class="card-body">
        <h2 class="count">{{ count }}</h2>
        <h5 class="card-title">{{title}}</h5>
        <div class="icon">
            <i v-bind:class="icon"></i>
        </div>
    </div>

    <a v-bind:href="url" class="btn btn-transparent rounded-0 no-border">
        Ver mais <i class="fa fa-arrow-circle-right"></i>
    </a>
</div>
</template>

<script>
export default {
    props: ["title", "color", "url", "icon", "count"],
    computed: {
        defineColor: function () {
            let bg = "bg-" + (this.color || "light");
            let text = "text-" + ((!this.color || this.color == "light") ? "dark" : "light");
            let border = "border-" + (this.color || "light");
            return bg + " " + text + " " + border;
        }
    }
};
</script>

<style>
.card-body {
    position: relative;
}

.btn-transparent {
    background: rgba(0, 0, 0, .3);
    color: #fff !important;
}

.btn-transparent:hover {
    background: rgba(0, 0, 0, .5);
}

.count {
    font-weight: bold;
    font-size: 35px;
}

.icon {
    display: inline-block;
    position: absolute;
    right: 5px;
    font-size: 67px;
    top: 50%;
    transform: translate(0, -50%);
    color: rgba(0, 0, 0, .3);

    -webkit-transition: all .3s linear;
    -o-transition: all .3s linear;
    transition: all .3s linear;
}

.card:hover>.card-body>.icon {
    font-size: 75px;
    color: rgba(0, 0, 0, .5);
}
</style>
