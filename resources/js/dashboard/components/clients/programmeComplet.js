export default {
  props: ["programme"],

  data() {
    return {
      dialog: false,
      show: false,
    };
  },

  methods: {
    getProgrammes() {
      console.log(this.programme);
    }
  },

};