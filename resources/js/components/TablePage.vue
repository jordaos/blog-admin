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
                    <th scope="col" class="text-capitalize c-pointer sort" v-on:click="orderColumn(index)" v-for="(title, index) in titles" :key="index">
                        {{ title }}
                        <i class="fa" v-bind:class="iconOrder(index)" aria-hidden="true"></i>
                    </th>
                    <th scope="col" v-if="url">Ações</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(item, index) in elementList" :key="index">
                    <td v-for="(i, key) in item" :key="key">{{ i }}</td>
                    <td v-if="url">
                        <b-btn variant="outline-success" v-b-modal.detailsModal @click="detailsElement(item)">
                            <i class="fa fa-eye"></i>
                        </b-btn>
                        <a v-bind:href="editUrl(item.id)" class="btn btn-outline-info">
                        <i class="fa fa-pencil"></i>
                    </a>
                        <b-btn variant="outline-danger" v-b-modal.deleteModal @click="deleteElement(item)">
                            <i class="fa fa-trash"></i>
                        </b-btn>
                    </td>
                </tr>
            </tbody>
        </table>

        <b-modal id="deleteModal" title="Alerta" @ok="handleOk" cancel-title="Não" ok-title="Sim">
            Deseja mesmo apagar este elemento?
        </b-modal>

        <b-modal id="detailsModal" title="Detalhes" cancel-title="Fechar">
            <div v-for="(val, key) in element" :key="key">
                <span class="text-capitalize">{{ titles[getIndexByKey(key)] }}: <b>{{val}}</b></span>
            </div>
        </b-modal>
    </div>
</template>

<script>
export default {
    props: ["titles", "items", "url", "token"],
    data: function () {
        return {
            element: null,
            search: "",
            order: "asc",
            column: 0,
            listItems: []
        };
    },
    computed: {
        createUrl: function () {
            return this.url + "/create";
        },
        elementList: function () {
            this.order.toLowerCase();
            this.column = parseInt(this.column);

            let columnKey = this.getKeyByIndex(this.column);

            if (this.order == "asc") {
                this.listItems.sort(function (el1, el2) {
                    if (el1[columnKey] > el2[columnKey]) return 1;
                    else if (el1[columnKey] < el2[columnKey]) return -1;
                    return 0;
                });
            } else {
                this.listItems.sort(function (el1, el2) {
                    if (el1[columnKey] < el2[columnKey]) return 1;
                    else if (el1[columnKey] > el2[columnKey]) return -1;
                    return 0;
                });
            }

            return this.listItems.filter(item => {
                for (let key in item) {
                    if (
                        item[key]
                        .toString()
                        .toLowerCase()
                        .indexOf(this.search.toLowerCase()) >= 0
                    )
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
        detailsElement(el) {
            this.element = el;
        },
        handleOk() {
            axios.delete(this.deleteUrl(this.element.id), {
                    data: {
                        _token: this.token
                    }
                }).then(res => {
                    let index = this.listItems.map(x => x.id).indexOf(this.element.id);
                    this.listItems.splice(index, 1);
                    this.element = null;
                })
                .catch(function (error) {
                    console.log(error);
                    this.element = null;
                });
        },
        getKeyByIndex(index) {
            let i = 0;
            for (let val in this.listItems[0]) {
                if (index == i) return val;
                i++;
            }
            return "id";
        },
        getIndexByKey(key) {
            let i = 0;
            for (let val in this.listItems[0]) {
                if (val == key) return i;
                i++;
            }
            return -1;
        },
        orderColumn(column) {
            if (column == this.column)
                this.order = this.order == "asc" ? "desc" : "asc";
            else if (this.order == "desc")
                this.order = "asc"
            this.column = column;
        },
        iconOrder(index) {
            if (index == this.column)
                return this.order == "asc" ?
                    "fa-sort-amount-asc" :
                    "fa-sort-amount-desc";
            return "fa-sort";
        },
        editUrl(id) {
            return this.url + "/" + id + "/edit";
        },
        deleteUrl(id) {
            return this.url + "/" + id;
        },
    },
    beforeMount() {
        this.listItems = this.items;
    }
};
</script>

<style>
.c-pointer {
    cursor: pointer;
}

.sort .fa {
    float: right;
    margin: 4px;
}
</style>
