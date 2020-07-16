import { authenticationService } from "../_services/authentication.service";
import router from "../routes";

export default {
  data() {
    return {
      isDisplay: false,
      currentUser: null,
      drawer: false,
      users: []
    };
  },

  computed: {
    isChecked() {
      return this.currentUser;
    },

    isClient() {
      if (!_.isEmpty(this.currentUser)) {
        return this.currentUser.role.name == "client";
      }
    },

    isCoach() {
      if (!_.isEmpty(this.currentUser)) {
        return this.currentUser.role.name == "coach";
      }
    },

    isGerant() {
      if (!_.isEmpty(this.currentUser)) {
        return this.currentUser.role.name == "gerant";
      }
    }
  },

  methods: {
    logout() {
      authenticationService.logout();
      router.push("/login");
    },
    show: function() {
      this.isDisplay = true;
    },
    hide: function() {
      this.isDisplay = false;
    }
  },

  created() {
    authenticationService.currentUser.subscribe(x => (this.currentUser = x));
  }
};