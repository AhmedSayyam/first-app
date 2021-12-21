<template>
  <ul class="nav  navbar-expand d-flex justify-content-center align-items-center">
    <li class="nav-item">
        <Link  class="nav-link" href="/">Home</Link>
    </li>
    <li class="nav-item">
        <Link  class="nav-link" href="/users">Users</Link>
    </li>
    <li class="nav-item">
        <Link class="nav-link"  href="/settings">Settings</Link>
    </li>
    <li class="nav-item">
        <Link class="btn btn-dark btn-sm" href="/logout" method="post" as="button" >Logout</Link>
    </li>
</ul>
</template>

<script>

export default {
    name: 'Nav',
}
</script>

<style>
</style>