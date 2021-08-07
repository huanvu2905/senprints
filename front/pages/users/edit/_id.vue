<template>
    <section class="container">
        <div class="card">
            <div class="card-header">
                Edit User
            </div>
            <div class="card-body">
                <form @submit="updateUser($event)">
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" placeholder="Enter Name" v-model="editUser.name">
                    </div>
                    <div class="form-group">
                        <label for="email">Email address</label>
                        <input type="email" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Enter email" v-model="editUser.email">
                    </div>
                     <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" v-model="editUser.password" id="password" placeholder="Enter password">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <nuxt-link to="/users" class="btn btn-primary">Cancel</nuxt-link>
                </form>
            </div>
        </div>
    </section>
</template>

<script>
export default {
    async fetch ({ store, route }) { 
       await store.dispatch('user/getUser', route.params.id);
    },
    mounted() {
        console.log(this.$router);
    },
    data() {
        return {
            editUser: {
                name: '',
                email: '',
                password: ''
            },
        }
    },
    created() {
        console.log(this.$store.state.user);
        Object.assign(this.editUser, this.$store.state.user.user);
    },
    methods: {
        async updateUser(event) {
            event.preventDefault();
            console.log(this.$store.state.user.user.id);

            let response = await this.$store.dispatch('user/editUser', this.editUser);
            console.log(response);
            if (response && response.data && response.data.message === 'success') {
                    this.$router.push({name: 'users'});
            } else {
                alert('error');
            }
        },
    }
}
</script>