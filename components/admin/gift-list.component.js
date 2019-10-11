Vue.component('gift-list', {
    props: ['showGifted'],
    template: '#gift-list',
    data: function() {
      return {
        giftsList: null,
        giftDescription: "",
        giftSelected: null,
        isEditing: false,
        giftedList: null,
        noGiftedList: null,
        allGifts: null
      }
    },
    methods: {     
      addGift: function(){
        var payload = {
            description: this.giftDescription
        }
        axios
        .post('http://localhost:3000/gift-list', payload)
        .then(res => {
          this.giftsList = res.data.response
          console.log(res.data.response) 
        })
      },
      selectGift: function(gift){
        this.giftSelected = gift;
        this.giftDescription = gift.description;
        this.isEditing = true;
      },
      editGift: function() {
        var payload = {
            description: this.giftDescription
        }
        axios
        .put('http://localhost:3000/gift-list' + this.giftSelected.id, payload)
        .then(res => {
          this.giftsList = res.data.response
          this.isEditing = false;
          this.giftDescription = "";
        })
      },

      cancelGift: function(){
          this.isEditing = false;
          this.giftDescription = "";
      },
      deleteGift: function(Gift){
        axios
        .delete('http://localhost:3000/gift-list' + gift.id)
        .then(res => {
          this.giftsList = res.data.response
        })
      },
      getGifts: function(){
        axios
        .get('http://localhost:3000/gifts')
        .then(res => {
          this.allGifts = res.data.response
        })
      }
    },
    computed: {},
    mounted () {
    axios
      .get('http://localhost:3000/gift-list')
      .then(res => {
        this.giftsList = res.data.response

        this.giftedList = this.giftsList.filter((giftList)=>{
            return giftList.gifted === 1;
        })  

        this.noGiftedList = this.giftsList.filter((giftList)=>{
          return giftList.gifted !== 1;
        })

        this.giftsList = res.data.response
      })
    }
  })