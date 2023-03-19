<template>
    <Head title="Dashboard" />
  
    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
          <div class="p-6 bg-white border-b border-gray-200">
          <form @submit.prevent="form.post(route('update.marker', form.id))">
              <input type="text" v-model="form.name" />
              <input type="text" v-model="form.description" />
              <input type="text" v-model="form.latitude" />
              <input type="text" v-model="form.longitude" />
              <input  type="submit" class="btn cursor-pointer px-2 py-1 font-bold text-gray-100 bg-blue-500 rounded hover:bg-blue-400" value="Update" />
              <!-- <a @click="form.get(route('edit.marker', item.id))"  class="cursor-pointer px-2 py-1 font-bold text-gray-100 bg-blue-500 rounded hover:bg-blue-400">Update</a> -->
          </form>
          </div>
        </div>
      </div>
    </div>
  </template>
  <script setup>
  import { Head, useForm } from "@inertiajs/inertia-vue3";
  import { inject, ref } from "vue";
  import { defineProps} from "vue";
  
  const route = inject("route");
  
  const props = defineProps({
      marker: String
  })
  
  const form = useForm({
      id:props.marker.id,
      name: props.marker.name,
      description: props.marker.description,
      latitude: props.marker.latitude,
      longitude: props.marker.longitude,
  })
  
  </script>
  