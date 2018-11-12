<html>
    <head>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.2/css/bulma.min.css">
        <style>
            body { padding-top: 40px; }
        </style>
    </head>
    <body>
        <section class="section">
            <div class="container" id="root">
               <coupon @applied="applied"></coupon>
               <h1 v-if="isApplied" v-text="appliedMessage"></h1>
            </div>
        </section>
        <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
        <script>
            Vue.component('coupon',{
                template : '<input placeholder="applied coupon here" @blur="appliedCoupon">',
                methods : {
                    appliedCoupon() {
                        this.$emit('applied');
                    }
                }
            });

            new Vue({
                el : "#root",
                data: {
                    isApplied : false,
                    appliedMessage : "You have applied coupon",
                },
                methods : {
                    applied() {
                        this.isApplied = true;
                    }
                } 
            });
        </script>
    </body>
</html>