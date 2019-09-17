<template>
    <div class="container">
        <button v-on:click="setSubscription()" class="btn btn-primary">課金</button>
    </div>
</template>

<script>
    import axios from "axios";
    import $ from "jquery";
    export default {
        methods: {
            setSubscription: function() {
                axios.defaults.headers["X-CSRF-TOKEN"] = $("meta[name=csrf-token]").attr("content");
                axios.defaults.headers["content-type"] = "application/json";
                axios.post("/api/users/subscription").then(
                    response => {
                        console.log(response);
                        alert("Success!");
                    },
                    error => {
                        console.log(error);
                        alert("Failed!");
                }
              );
            }
          }
        };

</script>