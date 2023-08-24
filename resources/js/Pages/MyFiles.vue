<script setup lang="ts">

import AuthenticatedLayout from "../Layouts/AuthenticatedLayout.vue";
</script>

<template>
    <AuthenticatedLayout>
  {{$page.url}}
    </AuthenticatedLayout>
</template>

<style scoped>

</style>
