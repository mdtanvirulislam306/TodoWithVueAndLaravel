<template>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center">Todo App</div>

                    <div class="card-body">
                        <form @submit.prevent="addTodo">
                            <div class="input-group">
                                <input
                                    type="text"
                                    class="form-control"
                                    v-model="todo"
                                />
                                <button class="btn btn-info" type="submit">
                                    Add
                                </button>
                            </div>
                        </form>
                        <table class="table table-bordered mt-2">
                            <thead>
                                <tr>
                                    <th>Title</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(item, index) in todos" :key="index">
                                    <td>{{ item.todo }}</td>
                                    <td class="text-center">
                                        <i
                                            class="fa-solid fa-check mx-2 text-primary"
                                        ></i>
                                        <i
                                            class="fa-solid fa-pen mx-2 text-info"
                                        ></i>
                                        <i
                                            @click="deleteTodo(index)"
                                            class="fa-solid fa-trash mx-2 text-danger"
                                        ></i>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            todos: [],
            todo: "",
            api: "http://127.0.0.1:8000/api/todos",
        };
    },
    mounted() {
        this.getTodo();
    },
    methods: {
        getTodo() {
            Vue.axios.get(this.api).then((response) => {
                this.todos = response.data;
                console.log(this.todos);
            });
        },
        addTodo() {
            let data = {
                todo: this.todo,
                status: 0,
            };
            Vue.axios.post(this.api, data).then((response) => {
                this.todos.push(response.data);
                this.todo = "";
                console.log(response.data);
            });
        },
        deleteTodo(index) {
            console.log(this.todos[index].id);
            Vue.axios
                .delete(this.api + "/" + this.todos[index].id)
                .then((response) => {
                    console.log(response.data);
                });
            this.todos = this.todos.filter((item) => item.index !== index);
        },
    },
};
</script>
