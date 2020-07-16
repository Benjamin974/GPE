import { apiService } from '../../_services/apiService'

export default {
    props: ["programme", 'programmes'],
    data() {
        return {
            dialog: false,
            snackbar: false,
            text: '',
            timeout: 2000,
        }
    },
    methods: {
        supprimer(item) {
            const index = this.programmes.indexOf(item);
            apiService.delete('/api/programmes/' + this.programme.id)
                .then(this.programmes.splice(index, 1))
            this.dialog = false
        }
    },
}