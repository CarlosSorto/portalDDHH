<template lang="html">
    <div class='js-map'>Cargando...</div>
</template>

<script>
export default {
    props: {
      height: {
        default: 200,
        type: Number
      },
      draggable: true,
      lat: {
        default: 13.6915591
      },
      lng: {
        default: -89.2497137
      },
      marker: {
        default() {
          return {
            lat: 13.6915591,
            lng: -89.2497137
          };
        }
      }
    },
    mounted() {

      this.map = this.$el;
      this.map.style.height = this.height+"px";
      this.gmap = new GMaps({
        div: this.$el,
        lat: this.lat,
        lng: this.lng,
        zoom: 12
      });

      if (((this.marker != null ? this.marker.lat : undefined) != null)  && ((this.marker != null ? this.marker.lng : undefined) != null)) {
        return this.gMarker = this.gmap.addMarker({
          lat: (this.marker != null ? this.marker.lat : undefined),
          lng: (this.marker != null ? this.marker.lng : undefined),
          draggable: this.draggable,
          dragend: position => {
            this.gmap.setCenter(position.latLng.lat(), position.latLng.lng());
            return this.$emit("marker:dragend", {
              position,
              map: this.gmap,
              gmap: this
            }
            );
          }
        });
      }
    },

    data() {
      return {};
    }
}
</script>
