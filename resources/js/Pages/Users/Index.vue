<template>
    <Head>
        <title>users</title>
        <meta type="description" contect="Information about Users Page" head-key="description" >
    </Head>
    <div class="">
        <div class="row">
            <div class="col-lg-9 ">
                <h2 class="align-middle">Users Page 
                    <Link v-if="can.createuser" class="btn btn-success btn-xs" href="/users/create">Create User</Link>
                </h2>
                
            </div>
            <div class="col-lg-3">
                <input class="form-control" type="text" placeholder="Search....." v-model="search">
            </div>
        </div>
        
        
        <table class="table table-hover align-middle table-bordered" >
            <thead class="table-light">
                <th>Name</th>
                <th>Email</th>
                <th>Action</th>
            </thead>
            <tbody>
                <tr v-for="user in users.data" :key="user.id">
                    <td>{{user.name}}</td>
                    <td>{{user.email}}</td>
                    <td>
                        <Link class="btn btn-sm btn-danger" v-if="user.can.edit" :href="`/users/${user.id}/delete`">Delete</Link>
                    </td>
                </tr>
            </tbody>
        </table>
        <div>
            <Pagination :links="users.links" />  
        </div>
    </div>
  
</template>

<script>
import Pagination from '../../Shared/Pagination.vue'
import {Inertia} from '@inertiajs/inertia'
// import {throttle} from 'loadash/throttle'
export default {
    components:{
        Pagination
    },
    props:{
        users: Object,
        filters: Object,
        can: Object
    },
    data(){
        return {
            search: this.filters.search
        }
    },
    watch:{
        search:function(value){
            Inertia.get('/users', {search: value}, {
                preserveState: true,
                replace: true
            });
            console.log("Value = ", value);
        }
    }
}
</script>

<style>
p{
    margin-top: 800px;
}

</style>