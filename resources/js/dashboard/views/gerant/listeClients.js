import { apiService } from '../../_services/apiService';
import DeleteClient from '../../components/gerants/DeleteClient.vue';
export default {
    components: {
        DeleteClient
    },

    data() {
        return {
            clients: []
        }
    },

    created() {
        this.listeClients();
    },

    methods: {
        listeClients() {
            apiService.get('/api/gerant/liste_clients').then(({data}) => {
                data.forEach(_data => {
                    this.clients.push(_data);
                });
                
            })
        },

        deleteClient() {
            console.log('toto');    
        }
    }


}