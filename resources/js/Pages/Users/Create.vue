<template>
    <Head>
        <title>Create User</title>
    </Head>
    <div class="col-lg-4 mx-auto p-3 border border-light shadow-sm">
        <h3 class="mt-3">Create User</h3>
        <div class="">
            <form @submit.prevent="createUser">
                <div class="col-lg-12 form-group mt-3">
                    <label for="name">Name</label>
                    <input
                    class="form-control"
                    type="text" name="name"
                    id="name" placeholder="Name..."
                    v-model="userForm.name">
                    <div v-if="$page.props.errors.name">
                        <span class="text-danger">{{$page.props.errors.name}}</span>
                    </div>
                </div>
                <div class="col-lg-12 form-group mt-3">
                    <label for="email">Email</label>
                    <input type="email" name="email" 
                        class="form-control"
                        id="email" placeholder="Email..."
                        v-model="userForm.email">
                        <div v-if="$page.props.errors.email">
                        <span class="text-danger">{{$page.props.errors.email}}</span>
                    </div>
                </div>
                <div class="col-lg-12 form-group mt-3">
                    <label for="password">Password</label>
                    <input type="password" name="password"
                    class="form-control"
                    id="password" placeholder="password..."
                    v-model="userForm.password">
                    <div v-if="$page.props.errors.password">
                        <span class="text-danger">{{$page.props.errors.password}}</span>
                    </div>
                </div>
                <div class="d-grid gap-2 col-12 mx-auto mt-3">
                    <button class="btn  btn-primary" type="submit" :disabled="processing"> Submit </button>
                </div>
            </form>
        </div>
    </div>
    
</template>

<script>
import {Inertia} from '@inertiajs/inertia';
export default {
    data(){
        return{
            userForm: {
                name: '',
                email: '',
                password: ''
            },
            processing:  false
        }
    },
    methods:{
        createUser(){
            this.processing = true;
            Inertia.post('/users', this.userForm, {
                onStart: () => {this.processing = true},
                onFinish: () => {this.processing = false}
            });
        }
    }
}
</script>

<style>
</style>