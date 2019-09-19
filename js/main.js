window.onload = function() {
    // process DOM elements here
    let hotels ={
        HotelOne:{
            name:'Cape Town Lodge Hotel',
            image1:'/images/cape-town-lodge-hotel-1.jpg',
            image2:'/images/cape-town-lodge-hotel-2.jpg',
            image3:'/images/cape-town-lodge-hotel-1.jpg',
        },
        HotelTwo:{
            name:'Radisson Blu Cape Town',
            image1:'/images/cape-town-lodge-hotel-1.jpg',
            image2:'/images/cape-town-lodge-hotel-2.jpg',
            image3:'/images/cape-town-lodge-hotel-1.jpg',
        },
        HotelThree:{
            name:'The Premier Hotel',
            image1:'/images/cape-town-lodge-hotel-1.jpg',
            image2:'/images/cape-town-lodge-hotel-2.jpg',
            image3:'/images/cape-town-lodge-hotel-1.jpg',
        },
        HotelFour:{
            name:'Table Bay Hotel',
            image1:'/images/cape-town-lodge-hotel-1.jpg',
            image2:'/images/cape-town-lodge-hotel-2.jpg',
            image3:'/images/cape-town-lodge-hotel-1.jpg',
    
        },
    };
    //select the current option in the dropdown menu
    let hotelSelect = document.getElementById('hotel-list');
    // let hotelCard = document.getElementById("hotel-card");
//     let hotelDetails = `<div class="card" style="width: 18rem;">
//     <img class="card-img-top" src="..." alt="Card image cap">
//     <div class="card-body">
//       <h5 class="card-title">Card title</h5>
//       <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
//       <a href="#" class="btn btn-primary">Go somewhere</a>
//     </div>
//   </div>`;
//   hotelCard.innerHTML = hotelDetails;
//     console.log(hotelCard);
    //add an eventlistener to change the content in the hotel details div based on change in dropdown menu
    
    hotelSelect.addEventListener('change', function(e){
        let hotels ={
            'Cape Town Lodge Hotel':{
                name:'Cape Town Lodge Hotel',
                image1:'./images/cape-town-lodge-hotel-1.jpg',
                image2:'../images/cape-town-lodge-hotel-2.jpg',
                image3:'../images/cape-town-lodge-hotel-1.jpg',
            },
            'hotel-2':{
                name:'Radisson Blu Cape Town',
                image1:'./images/cape-town-lodge-hotel-1.jpg',
                image2:'../images/cape-town-lodge-hotel-2.jpg',
                image3:'../images/cape-town-lodge-hotel-1.jpg',
            },
            'hotel-3':{
                name:'The Premier Hotel',
                image1:'./images/cape-town-lodge-hotel-1.jpg',
                image2:'../images/cape-town-lodge-hotel-2.jpg',
                image3:'../images/cape-town-lodge-hotel-1.jpg',
            },
            'hotel-4':{
                name:'Table Bay Hotel',
                image1:'./images/cape-town-lodge-hotel-1.jpg',
                image2:'../images/cape-town-lodge-hotel-2.jpg',
                image3:'../images/cape-town-lodge-hotel-1.jpg',
        
            },
        };

        let hotelSelect = document.getElementById('hotel-list');
        // console.log(hotelSelect)
        //captures the hotels selected and stores into following variable
        // console.log(document.getElementById("hotel-list").selectedIndex);
        let hotelSelectIndex = e.target.options[e.target.selectedIndex].value;

        let hotelChoice = hotels[hotelSelectIndex];
        //get hotel- card container
        let hotelCard = document.getElementById("hotel-card");
        // console.log(hotelCard)
        //get hotel-carousel container
        let hotelCarousel = document.getElementById("hotel-carousel");
        console.log(hotelCarousel)
        // console.log(hotel)
        //Hotel details cards
        let hotelDetails = `<div class="card" style="width: 18rem;">
        <h5 class="card-header text-center">Hotel Information</h5>
        <img class="card-img-top" src="${hotelChoice.image1}" alt="Card image cap">
        <div class="card-body">
          <h5 class="card-title">${hotelChoice.name}</h5>
          <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
          <a href="#" class="btn btn-primary">Make a Booking</a>
        </div>
      </div>`;
        //hotel carousel html
        let hotelSlides  =`<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="3"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
          <!-- Slide One - Set the background image for this slide in the line below -->
          <div class="carousel-item active" style="background-image: url(${hotelChoice.image1})">
          </div>
          <!-- Slide Two - Set the background image for this slide in the line below -->
          <div class="carousel-item" style="background-image: url(${hotelChoice.image2})">
            <div class="carousel-caption d-none d-md-block">
              <h2 class="display-3">Great Prices</h2>
              <p class="lead">Do not miss out on our great deals.</p>
              <a href="indexssss.php" class="btn btn-outline-primary landing-link"><i class="fas fa-arrow-right fa-fw"></i>BOOK NOW</a>
            </div>
          </div>
          <!-- Slide Three - Set the background image for this slide in the line below -->
          <div class="carousel-item" style="background-image: url(${hotelChoice.image3})">
            <div class="carousel-caption d-none d-md-block">
              <h2 class="display-3">Great Deals at 5 Star Hotels</h2>
              <p class="lead">This is a description for the third slide.</p>
              <a href="indexssss.php" class="btn btn-outline-primary landing-link"><i class="fas fa-arrow-right fa-fw"></i>BOOK NOW</a>
            </div>
          </div>
            <!-- Slide four - Set the background image for this slide in the line below -->
          <div class="carousel-item" style="background-image: url(${hotelChoice.image4})">
            <div class="carousel-caption d-none d-md-block">
            <h2 class="display-3">Quality Servivce</h2>
              <p class="lead">Great customer service for all our guests.</p>
              <a href="indexssss.php" class="btn btn-outline-primary landing-link"><i class="fas fa-arrow-right fa-fw"></i>BOOK NOW</a>
            </div>
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
      </div>`;
      hotelCard.innerHTML = hotelDetails;
      hotelCarousel.innerHTML =hotelSlides;
    
    
    
    }
    );
};


//   let hotels = {
//         HotelOne: {
//             name: 'Hotel One',
//             image: 'http://placehold.it/100x100(255 B)'
//         },
//         HotelTwo: {
//             name: 'Hotel Two',
//             image: 'http://placehold.it/200x200(781 B)'
//         },
//         HotelThree: {
//             name: 'Hotel Three',
//             image: 'http://placehold.it/300x300(1 kB)
// http://placehold.it/300x300
// '
//         },
//         HotelFour: {
//             name: 'Hotel Four',
//             image: 'http://placehold.it/400x400(1 kB)
// http://placehold.it/400x400
// '
//         }
//     };
//     let select = document.getElementById('select')
//     select.addEventListener('change', function() {

//         let selectedHotel = hotels[select.options       [select.selectedIndex].value];

        


//         document.getElementById('hotel-image').innerHTML = "<img src=" + selectedHotel.image + "/>";
//         document.getElementById('hotel-details').innerHTML = selectedHotel.name;
//     });
// </script>