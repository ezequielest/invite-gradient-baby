Vue.component('guest-list', {
    template: '#guest-table',
    data: function() {
      return {
        guestsList: null,
        guestDescription: "",
        guestSelected: null,
        isEditing: false
      }
    },
    methods: {
      getGuest: function(){
        axios
        .get('http://localhost:3000/guest')
        .then(res => {
          this.guestsList = res.data.response
          console.log(res.data.response) 
        })
      },
      addGuest: function(){
        var payload = {
            description: this.guestDescription
        }
        axios
        .post('http://localhost:3000/guest', payload)
        .then(res => {
          this.guestsList = res.data.response
          console.log(res.data.response) 
        })
      },
      selectGuest: function(guest){
        this.guestSelected = guest;
        this.guestDescription = guest.description;
        this.isEditing = true;
      },
      editGuest: function() {
        var payload = {
            description: this.guestDescription
        }
        axios
        .put('http://localhost:3000/guest/' + this.guestSelected.id, payload)
        .then(res => {
          this.guestsList = res.data.response
          this.isEditing = false;
          this.guestDescription = "";
          console.log(res.data.response) 
        })
      },
      cancelGuest: function(){
          this.isEditing = false;
          this.guestDescription = "";
      },
      deleteGuest: function(guest){
        axios
        .delete('http://localhost:3000/guest/' + guest.id)
        .then(res => {
          this.guestsList = res.data.response
        })
    }
    },
    computed: {},
    mounted () {
    axios
      .get('http://localhost:3000/guest')
      .then(res => {
        this.guestsList = res.data.response
        console.log(res.data.response) 
      })
    }
  })