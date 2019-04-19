<template>
    <div>
        <div class="form-group">
            <router-link :to="{name: 'createCompany'}" class="btn btn-success">Create new company</router-link>
        </div>

        <div class="panel panel-default">
            <div class="card-header"><h3>Companies list</h3></div>
            <div class="panel-body">
                <table class="table table-bordered table-striped">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Address</th>
                        <th>Website</th>
                        <th>Email</th>
                        <th width="100">&nbsp;</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="company, index in companies">
                        <td>{{ company.name }}</td>
                        <td>{{ company.address }}</td>
                        <td>{{ company.website }}</td>
                        <td>{{ company.email }}</td>
                        <td>
                            <router-link :to="{name: 'editCompany', params: {id: company.id}}" class="btn btn-xs btn-default">
                                Edit
                            </router-link>
                            <a href="#"
                               class="btn btn-xs btn-danger"
                               v-on:click="deleteEntry(company.id, index)">
                                Delete
                            </a>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data: function () {
            return {
                companies: [],
                vk_data: {
                  auth_key: this.hash('access_token')
                }
            }
        },
        mounted() {
            var app = this;
            axios.get('/api/v1/companies')
                .then(function (resp) {
                    app.companies = resp.data;
                })
                .catch(function (resp) {
                    console.log(resp);
                    alert("Could not load companies");
                });
            axios.post('/api/socialNetworks/vk', app.vk_data)
                .then(function (resp) {
                    console.log(resp);
                })
                .catch(function (resp) {
                    console.log(resp);
                    alert("Could not load auth_key");
                });
        },
        methods: {
            deleteEntry(id, index) {
                if (confirm("Do you really want to delete it?")) {
                    var app = this;
                    axios.delete('/api/v1/companies/' + id)
                        .then(function (resp) {
                            app.companies.splice(index, 1);
                        })
                        .catch(function (resp) {
                            alert("Could not delete company");
                        });
                }
            },
            hash(key) {
            	var hash = {}, q;
            	if (location.hash) {
            		var arr = location.hash.slice(3).split('&');
            		for (var i = 0; i < arr.length; i++) {
            			if (q = arr[i].split('='))
            				hash[q[0]] = decodeURIComponent(q[1]) || null;
            		}
            	}
            	return key
            			? hash.hasOwnProperty(key) ? hash[key] : null
            			: hash;
            }
        }
    }
</script>
