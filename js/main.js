let app = new Vue({
    el: "#app",
    data:{
        posts: null
    },
    mounted() {
        axios.get("php/search.php").then(res => {
            console.log(res.data)
            this.posts = res.data;
        })
    },
    methods: {
        change_data(data) {
            console.log(data)
            this.posts = data; 
        }
    }
})

let search = new Vue({
    el: "#regex",
    methods: {
        search() {
            let val = this.$el.value;
            axios.get("php/search.php", {
                params: {
                    search: val
                }
            }).then(res => {
                app.change_data(res.data);
            })
        }
    }
}) 