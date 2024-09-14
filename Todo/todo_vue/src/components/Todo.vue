<template>
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-xl-12">
                <div class="bg-light rounded h-100 p-4">
                    <h6 class="mb-4">ToDo List</h6>

                    <div class="mb-3">
                        <label for="ToDo" class="form-label">Write Your ToDo...</label>
                        <input type="text" class="form-control" id="Todo" v-model="title"
                            aria-describedby="emailHelp">
                    </div>
                     <button v-if="id == 0" @click="save" class="btn btn-primary">Save</button>
                     <button v-else @click="toupdate" class="btn btn-primary">Update</button>

                </div>
            </div>
        </div>
    </div>
    <br><br>
    <div class="col-12">
        <div class="bg-light rounded h-100 p-4 vh-100">
            <h6 class="mb-4">ToDo List</h6>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Sl</th>
                            <th scope="col">Task Name</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr v-for="(t, i) in todolist" :key="i">
                            <th scope="row">{{ i + 1 }}</th>
                            <td>{{ t.title }}</td>
                            <td>
                                <button @click="edittodo(t.id)" class="btn btn-success btn-sm">Edit</button>&nbsp;
                                <button @click="deletetodo(t.id)" class="btn btn-danger btn-sm">Delete</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios';
export default{
    data(){
        return{
            todolist:[],
            title:'',
            id:0,
        }
    },
    methods:{
        gettodo(){
            axios.get("http://127.0.0.1:8000/api/todo")
            .then((res)=>{
                this.todolist = res.data.data
                console.log(res.data.data)
            })
        },
        save(){
            axios.post("http://127.0.0.1:8000/api/todo",{title:this.title})
            .then((res)=>{
                this.title
                this.gettodo()
                this.title = ''
                this.id = ''
                console.log(res.data.data)
            });

        },
        deletetodo(id){
            axios.delete("http://127.0.0.1:8000/api/todo/" + id)
            .then(()=>{
               this.gettodo()
            });
        },
        edittodo(id){
            this.id = id
            axios.get("http://127.0.0.1:8000/api/todo/" + id + "/edit")
            .then((res)=>{
                const t = res.data.data
                this.title = t.title
                this.gettodo()
            });
        },
        toupdate(){
            axios.put("http://127.0.0.1:8000/api/todo/"+this.id,{title:this.title})
            .then((res)=>{
                console.log
                this.id = 0;
                this.title = '';
                this.gettodo();
            })
        }

    },
    mounted(){
        this.gettodo()
    }
}

</script>