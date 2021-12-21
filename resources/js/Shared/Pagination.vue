<template>
    <div class="col-lg-12 text-center">
        <ul class="pagination">
            <li class="page-item" v-for="link in links" :key="link" :class="{'active': link.active}">
                <Link v-if="link.url" class="page-link" :href="link.url" v-html="link.label"  
                    :class="{'page-span-bold': link.active}"
                    />
                <button class="page-link" disabled v-else v-html="link.label"></button>
            </li>  
        </ul>
    </div>
</template>


<script>
export default {
    props:{
        links: Array
    }
}
</script>

<style>
.page-link{
    margin: 5px;
    text-decoration: none;
    font-size: 18px;
}
.page-span{
    color: gray;
}
.page-span-bold{
    font-weight: bold;
    color: black;
}
</style>