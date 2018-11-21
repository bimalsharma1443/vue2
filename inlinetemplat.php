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
               <progress-view inline-template>
                    <div>
                        <h1>only one tag is allow inside inline template</h1>
                        <h1>for second tag you have to in side of single tag</h1>
                    </div>
               </progress-view>
            </div>
        </section>
        <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
        <script>
            Vue.component('progress-view',{
        
            });

            new Vue({
                el : "#root"
            });
        </script>
    </body>
</html>