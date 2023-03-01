<div x-data="{
    scriptLoaded: false,
    mapId: null,
    markersOnMap: [],
    center: null,
    infowindow: null,
    markers: null,
    cluster: null,
    map: null,
    maps: null,
    styles: null,
    setupMaps() {
        this.initMap(this.maps);
    },
    getMarkers() {
        let markersArray = [];
        if ({{ json_encode($content['markers']) }}) {
            {{ json_encode($content['markers']) }}.forEach((element) => {
                const position = {
                    lat: parseFloat(element.lat),
                    lng: parseFloat(element.lng),
                };
                markersArray.push({ position: position });
            });
        }
        return markersArray;
    },
    async acceptCookies() {
        try {
            await window.init;
            scriptLoaded = true;
            this.maps = document.querySelector(
                `#${this.mapId.toString()}`
            );
            this.scriptLoaded = true;
            localStorage.setItem('google-maps-accepted', 'accepted');
        } catch (error) {
            this.scriptLoaded = false;
            localStorage.removeItem('google-maps-accepted');
            console.error(error);
        } finally {
            this.setupMaps();
        }
    },
    initMap(element) {
        markers = this.getMarkers();

        let zoom = parseFloat({{ json_encode($content['zoom']) }});

        map = new google.maps.Map(element, {
            zoom,
            center: markers?.length > 0 ? markers[0]?.position || { lat: 54, lng: 10 } : this.center || { lat: 54, lng: 10 },
            styles: this.styles.mapStyles || null,
        });

        // map.addListener('click', () => {
        //     infowindow.close();
        // });

        if (markers.length > 1) {
            for (var i = 0; i < markers.length; i++) {
                this.addMarker(markers[i]);
            }
        } else {
            new google.maps.Marker({
                position: this.center,
                map: map,
            });
        }

        // if (this.styles.clusterStyles) {
        //     cluster = new MarkerClusterer(map, markersOnMap, {
        //         styles: this.styles.clusterStyles,
        //         maxZoom: 12,
        //         ignoreHidden: true,
        //     });
        // }
    },
    addMarker(marker) {
        var newMarker = new google.maps.Marker({
            position: marker.position,
            // categories: marker.categories?.map(el => el.toString()) || [],
            map: map,
            icon: marker.icon || this.styles.marker || null,
        });

        this.markersOnMap.push(newMarker);

        if (marker.infowindow) {
            google.maps.event.addListener(newMarker, 'click', () => {
                this.infowindow.setContent(marker.infowindow);
                this.infowindow.open(map, newMarker);
            });
        }
        if (marker.infowindow && {{ json_encode($content['mouseover']) }} === 'true') {
            google.maps.event.addListener(newMarker, 'mouseover', () => {
                this.infowindow.setContent(marker.infowindow);
                this.infowindow.open(map, newMarker);
            });
        }
    }
}" x-init="$nextTick(() => {
    mapId = `map-${Math.random().toString(36).substring(2, 15) + Math.random().toString(36).substring(2, 15)}`;
    styles = window.styles;
    if ({{ json_encode($content['lat']) }} && {{ json_encode($content['lng']) }}) {
        center = {
            lat: parseFloat({{ json_encode($content['lat']) }}),
            lng: parseFloat({{ json_encode($content['lng']) }}),
        }
    }

    if (localStorage.getItem('google-maps-accepted')) {
        acceptCookies();
    }
})"
    class="w-full h-[433px] lg:h-[675px] relative border-2 border-primary-200">
    <template x-if="!scriptLoaded">
        <div class="absolute top-0 left-0 flex flex-col items-center justify-center w-full h-full">
            <div class="pb-2">
                I agree to the use of Google Maps.
            </div>
            <x-button-primary outline x-on:click="acceptCookies">Show Map</x-button-primary>
        </div>
    </template>
    <template x-if="mapId">
        <div class="z-10 h-full -mx-5 md:mx-0" x-bind:id="mapId"></div>
    </template>
</div>

<style>
    .gm-style-iw,
    .gm-style-iw-c,
    .gm-style {
        background-color: transparent !important;
        box-shadow: none !important;
        border-radius: 0 !important;
        padding: 0 !important;
        max-height: unset !important;
        overflow: visible !important;
    }

    .gm-ui-hover-effect {
        display: none !important;
    }

    .gm-style .gm-style-iw-d {
        overflow: visible !important;
    }
</style>
