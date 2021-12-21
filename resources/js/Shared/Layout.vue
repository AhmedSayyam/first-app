<template>
    <header class="container shadow-sm d-flex justify-content-between align-items-center p-4">
        <h5 class="m-0">Welcome {{$page.props.auth.user.myname}}</h5>
        <!-- <h6><input type="text" placeholder="Name"></h6> -->
        
        <Nav />
    </header>
    <div class="container p-3 bg-light ">
        <slot />
    </div>
    
</template>

<script>
import Nav from './Nav.vue'
export default {
    components: {
        Nav
    },
    computed: {
        username(){
            return this.$page.props.auth.user.myname;
        }
    }
}
</script>

<style>

</style>