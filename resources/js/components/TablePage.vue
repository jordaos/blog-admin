<template>
<div>
    <div class="form-inline mb-2">
        <a v-bind:href="createUrl" v-if="url" class="btn btn-success"><i class="fa fa-plus"></i> Criar</a>
        <div class="input-group ml-auto">
            <input type="search" class="form-control" placeholder="Buscar..." v-model="search">
        </div>
    </div>

    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th scope="col" class="text-capitalize" v-for="(title, index) in titles" :key="index">{{ title }}</th>
                <th scope="col" v-if="url">Ações</th>
            </tr>
        </thead>
        <tbody>
            <tr v-for="(item, index) in elementList" :key="index">
                <td v-for="(i, key) in item" :key="key">{{i}}</td>
                <td v-if="url">
                    <a v-bind:href="editUrl" class="btn btn-outline-info">
                        <i class="fa fa-pencil"></i>
                    </a>
                    <b-btn
                        variant="outline-danger"
                        v-b-modal.modal1
                        @click="deleteElement(item)">
                        <i class="fa fa-trash"></i>
                    </b-btn>
                </td>
            </tr>
        </tbody>
    </table>

    <b-modal 
        id="modal1" 
        title="Alerta" 
        @ok="handleOk"
        cancel-title="Não"
        ok-title="Sim">
        Deseja mesmo apagar este elemento?
    </b-modal>
</div>
</template>

<script>
export default {
    props: ['titles', 'items', 'url', 'token'],
    data: function() {
        return {
            element: null,
            search: ''
        }
    },
    computed: {
        createUrl: function () {
            return this.url + "/create";
        },
        editUrl: function () {
            return this.url + "/edit";
        },
        elementList: function() {
            return this.items.filter(item => {
                for(let key in item) {
                    if (item[key].toString().toLowerCase().indexOf(this.search.toLowerCase()) >= 0)
                        return true;
                }
                return false;
            });
        }
    },
    methods: {
        deleteElement(el) {
            this.element = el;
        },
        handleOk() {
            /**
             * TODO
             * Chamar requisição para deletar (this.element.id)
             */
            console.log(this.element.id);
            this.element = null;
        },
    }
}
</script>
