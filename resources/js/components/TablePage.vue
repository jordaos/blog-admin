<template>
<div>
    <a v-bind:href="createUrl" v-if="url" class="btn btn-success"><i class="fa fa-plus"></i> Criar</a>

    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th scope="col" v-for="(title, index) in titles" :key="index">{{ title }}</th>
                <th scope="col" v-if="url">Ações</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="(item, index) in items" :key="index">
                <td v-for="(i, key) in item" :key="key">{{i}}</td>
                <td v-if="url">
                    <a v-bind:href="editUrl" class="btn btn-link text-info">
                        <i class="fa fa-pencil"></i>
                    </a>
                    <button class="btn btn-link text-danger">
                        <i class="fa fa-trash"></i>
                    </button>
                </td>
            </tr>
        </tbody>
    </table>
</div>
</template>

<script>
export default {
    props: ['titles', 'items', 'url', 'token'],
    computed: {
        createUrl: function () {
            return this.url + "/create";
        },
        editUrl: function () {
            return this.url + "/edit";
        }
    }
}
</script>
