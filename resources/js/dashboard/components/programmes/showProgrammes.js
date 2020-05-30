import AddProgramme from './AddProgramme.vue';

import { apiService } from '../../_services/apiService';

export default {

    components: {
        AddProgramme,
    },
    
    data() {
        return {
            programmes: [],
        }

    },
    methods: {
        getDatas() {
            this.pgrogrammes = [];
            apiService.get('/api/programmes/coach/' + this.$route.params.id)
                .then(({ data }) => {
                    data.data.forEach(_data => {
                        this.programmes.push(_data);
                    })
                    
                })
                .catch();
        },
    },

    created() {
        this.getDatas();
    }
}