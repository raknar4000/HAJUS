<template>
    <tr>
        <td>{{ form.name }}</td>
        <td>{{ form.description }}</td>
        <td>{{ form.latitude }}</td>
        <td>{{ form.latitude }}</td>
        <a @click="form.get(route('edit.marker', item.id))"  class="cursor-pointer px-2 py-1 font-bold text-gray-100 bg-blue-500 rounded hover:bg-blue-400">Edit</a>
        <a @click="form.delete(route('delete.marker', item.id))"  class="cursor-pointer px-2 py-1 font-bold text-gray-100 bg-red-500 rounded hover:bg-red-400">Delete</a>
    </tr>
</template>
<script setup>
import { Head, useForm } from "@inertiajs/inertia-vue3";
import { inject, ref } from "vue";

const route = inject("route");

const props = defineProps(["item"])

const form = useForm({
    name:props.item.name,
    description: props.item.description,
    latitude: props.item.latitude,
    longitude: props.item.longitude
})
</script>
