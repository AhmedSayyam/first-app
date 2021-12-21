<template>
    <Head>
        <title>Home</title>
        <meta type="description" contect="Information about Home Page" head-key="description" >
    </Head>
        <h1>
            Welcome {{name}}
        </h1>
        <p>In this series, we will use following frameworks:</p>
        <ul>
            <li v-for="framework of frameworks" :key="framework" v-text="framework">
            </li>
        </ul>
</template>

<script>
export default {
    props:{
        name: String,
        frameworks: Array
    }
}
</script>

<style>

</style>