import { apiService } from '../../_services/apiService';
import UpdateProgramme from '../programme/UpdateProgramme.vue';
export default {
    props: ['programme'],
    components: {
        UpdateProgramme
    },
    data() {
        return {
            tab: null,
            // programme: [],
            coach: [],
            seance: [],
            salleDeSport: []
        }
    },

    created() {
        // this.getDatas();
    },
    methods: {
        getDatas() {
            console.log(this.programme)
            // apiService.get('/api/programmes/coach/' + this.$route.params.id)
            //     .then(({ data }) => {

                    // this.programme.forEach(_data => {
                    //     this.programme.push(_data);
                    //     this.seance.push(_data.seance)
                    // })
                    

                // })
                // .catch();
        },
    }

}