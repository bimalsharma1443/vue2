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
                <tabs>
                    <tab name="tab1" :selected="true"  >
                        <h1> This is tab1</h1>
                    </tab>
                    <tab name="tab2">
                        <h1> This is tab2</h1>
                    </tab>
                    <tab name="tab3">
                        <h1> This is tab3</h1>
                    </tab>
                    <tab name="tab4">
                        <h1> This is tab4</h1>
                    </tab>
                    <tab name="tab5">
                        <h1> This is tab5</h1>
                    </tab>
                </tabs>
            </div>
        </section>
        <script src="https://cdn.jsdelivr.net/npm/vue/dist/vue.js"></script>
        <script>
            Vue.component('tabs',{
                template : `
                    <div>
                        <div class="tabs">
                            <ul>
                                <li v-for="tab in tabs" :class="{ 'is-active':tab.isActive }">
                                    <a :href="tab.href" @click="selectTab(tab)" >{{ tab.name }}</a>
                                </li>
                            </ul>
                        </div>
                         <div class="tabs-details">
                            <slot></slot>
                        </div>
                    </div>
                `,
                data() {
                    return {
                        tabs: []
                    };
                },
                created() {
                    this.tabs = this.$children;
                },
                methods : {
                    selectTab(selectedTab) {
                        this.tabs.forEach(tab => {
                            tab.isActive = (tab.href == selectedTab.href);
                        });
                    }
                }
            });

            Vue.component('tab',{
                template : `
                    <div v-show="isActive"><slot></slot></div>
                `,
                props: {
                    name: {required : true},
                    selected: { default: false }
                },
                data() {
                    return {
                        isActive: false
                    };
                },
                computed:{
                    href(){
                        return '#'+ this.name.toLowerCase().replace(/ /g, '-');
                    }
                },
                mounted() {
                    this.isActive = this.selected;
                },
            });

            new Vue({
                el : "#root"
            });
        </script>
    </body>
</html>