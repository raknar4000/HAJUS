<template>
    <div class="lg:w-7/12 w-full h-96">
        <div class="h-full w-full" id="map" ref="map"></div>
        <form @submit.prevent="form.post(route('add.marker'), { onSuccess: () => form.reset()})">
            <div>
            <input type="text" v-model="form.name" />
        </div>
        <div>
            <input type="text" v-model="form.description" />

        </div>
        <div>
            <input type="text" v-model="form.lat" />

        </div>
        <div>
            <input type="text" v-model="form.lng" />

        </div>
        <div>
            <input type="text" v-model="form.edited" />

        </div>
        <div>
            <input type="text" v-model="form.added" />

        </div>
            <input type="submit" class="btn" value="Add marker" />
        </form>

        <table>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>latitude</th>
                <th>longitude</th>
                <th>edited</th>
                <th>added</th>
            </tr>
            <MarkerTable v-for="item in data" :key="item.id" :item="item" />
        </table>

    </div>
</template>
<script setup>
import { Head, useForm } from "@inertiajs/inertia-vue3";
import { Loader } from "@googlemaps/js-api-loader";
import { inject, ref } from "vue";
import { defineProps, reactive, defineEmits } from "vue";

const route = inject("route");

let map = ref(null);

const props = defineProps({
    data: Array,
});

const form = useForm({
    name: "",
    description: "",
    lat: "",
    lng: "",
    added: "",
    edited: "",
});

const loader = new Loader({
    apiKey: "",
    version: "weekly",
});


loader.load().then(() => {
    let myLatLng = { lat: 58.24806, lng: 22.50389 };
    map = new google.maps.Map(map.value, {
        zoom: 8,
        center: myLatLng,
    });

    for (const key in props.data) {
        let markers = new google.maps.Marker({
            position: {
                lat: props.data[key].latitude,
                lng: props.data[key].longitude,
            },
            label: props.data[key].name,
            map,
        });
    }

    new google.maps.Marker({
        position: myLatLng,
        map,
        title: "Tere",
    });


    google.maps.event.addListener(map, "click", (event) => {
        const cord = event.latLng.toJSON();
        form.lng = cord.lng;
        form.lat = cord.lat;
        addMarker(event.latLng, map);
    });
});
function addMarker(location, map) {
    new google.maps.Marker({
        position: location,
        label: form.name ? form.name : "",
        map: map,
    });

}

</script>
