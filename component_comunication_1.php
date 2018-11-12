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
            </div>
        </section>
        <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
        <script>
            window.Event = new class {

                constructor() {
                    this.vue = new Vue();
                }

                fire(event,$data=null) {
                    this.vue.$emit(event);
                }

                listen(event,callback) {
                    this.vue.$on(event,callback);
                }
            }


            Vue.component('coupon',{
                template : '<input placeholder="applied coupon here" @blur="appliedCoupon">',
                methods : {
                    appliedCoupon() {
                        Event.fire('applied');
                    }
                }
            });

            new Vue({
                el : "#root",
                data: {
                    isApplied : false,
                    appliedMessage : "You have applied coupon",
                },
                created() {
                    Event.listen('applied',()=> alert('handling It!'));
                } 
            });
        </script>
    </body>
</html>