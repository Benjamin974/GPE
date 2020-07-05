import { apiService } from '../../_services/apiService';
import AddSalle from '../../components/gerants/AddSalle.vue';
import AddUser from '../../components/gerants/AddUser.vue';
export default {
    components: {
        AddSalle,
        AddUser
    },

    data() {
        return {
            tab: null,
            salle: []
        }
    },

    methods: {
        getDatas() {
            apiService.get('/api/gerant/' + this.$route.params.id).then(({ data }) => {
                data.forEach(_data => {
                    this.salle.push(_data);
                })
            })
        }
    },

    created() {
        this.getDatas();
    }
}