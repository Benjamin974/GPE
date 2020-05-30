import {apiService} from '../../_services/apiService';
import UpdateProgramme from '../../components/programme/UpdateProgramme.vue';
export default {
    components: {
        UpdateProgramme
    },
    data() {
        return {
            tab: null,
            programme: [],
            coach: [],
            seance: [],
            salleDeSport: []
        }
    },

    created() {
        this.getDatas();
    },
    methods: {
        getDatas() {
            apiService.get('/api/programmes/' + this.$route.params.id)
                .then(({ data }) => {
                    this.coach.push(data.data.coach);
                    this.seance.push(data.data.seance);
                    this.salleDeSport.push(data.data.salleDeSport);
                    this.programme.push(data.data);
                })
                .catch();
        },
    }

}