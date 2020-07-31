import { apiService } from '../../_services/apiService'

export default {
    props: {
        client: {
            default: function () {
                return {}
            },

        },
        clients: {
            default: function () {
                return {}
            }
        }
    },
    data() {
        return {
            dialog: false,
            timeout: 3000,
            snackbar: false,
            text: '',
        }
    },
    methods: {
        deleteClient(client) {
            const index = this.clients.indexOf(client);
            apiService.delete('/api/gerant/' + this.client.id + '/client')
                .then(
                    this.clients.splice(index, 1)
                    )
            this.dialog = false
        }
    }
}