<template>
  <Head>
        <title>Login</title>
    </Head>
    <div class="container ">
      <div class="col-lg-4 mx-auto border border-light shadow-sm p-4 mt-5 rounded">
        <h3>Login Form</h3>
        <div class="">
            <form @submit.prevent="login">
                <div class="form-group mt-3">
                    <label for="email">Email</label>
                    <input type="email" name="email" 
                    class="form-control"
                        id="email" placeholder="Email..."
                        v-model="form.email">
                    <div v-if="$page.props.errors.email">
                      <span class="text-danger">{{$page.props.errors.email}}</span>
                    </div>  
                </div>
                <div class="form-group mt-3">
                    <label for="password">Password</label>
                    <input type="password" name="password"
                    class="form-control"
                    id="password" placeholder="password..."
                    v-model="form.password">
                      <div v-if="$page.props.errors.password">
                          <span  class="text-danger">{{$page.props.errors.password}}</span>
                      </div>
                </div>
                
                <div class="d-grid gap-2 col-12 mx-auto mt-3">
                    <button class="btn btn-primary btn-block" type="submit"> Login </button>
                </div>
            </form>
        </div>
      </div>
    </div>
    
</template>

<script>
import {useForm} from '@inertiajs/inertia-vue3'
export default {
    layout: null,
     data(){
        return{
            form : useForm({
              email: '',
              password: ''
            })
        }
    },
    methods:{
        login(){
            this.form.post('/login');
            // Inertia.post('/users', this.userForm, {
            //     onStart: () => {this.processing = true},
            //     onFinish: () => {this.processing = false}
            // });
        }
    }
}
</script>

<style>

</style>