import AddProgramme from './AddProgramme.vue';
import Programme from '../programme/Programme.vue';
import DeleteProgramme from '../programmes/DeleteProgramme.vue';
import UpdateProgramme from '../programmes/UpdateProgramme.vue';
import { apiService } from '../../_services/apiService';

export default {

    components: {
        AddProgramme,
        Programme,
        DeleteProgramme,
        UpdateProgramme
    },
    
    data() {
        return {
            programmes: [],
            headers: [{
                text: "Programmes",
                align: "start",
                sortable: false,
                value: "programmes"
            },
            { text: "difficulte", value: "difficulte" },
            { text: "prix", value: "prix" },
            { text: "seance", value: "seance.exercice" },
            { text: "image", value: "image.lien" },
            { text: "actions", value: "actions" },
    
            ],
           
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