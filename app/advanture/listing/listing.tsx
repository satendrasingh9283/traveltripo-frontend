"use client";
// components/Home1.js
import React, { useEffect, useState } from "react";
import type { Metadata } from "next";
import '../listing/listing.css'
import Image from 'next/image'
// import commonBanner from '../../../public/assets/images/com-img.jpg'
import hotelImg from '../../../public/assets/images/hotel-img.jpg'
import { useRouter } from 'next/navigation';

import { useSearchParams } from 'next/navigation';


function Home() {


  const [hotelList, setHotelList] = useState<Hotel[]>([]);
  const [hotelByCity, setHotelByCity] = useState<Hotel[]>([]);

  const [filter, setFilter] = useState(false);
  const [itemID, setitemID] = useState();
  const [cityCheck, setcityCheck] = useState(false);



  interface Hotel {
    id: string;
    propery_type: string;
    city: string;
    name: string;
    images: string;
    room_type: string;
    property_for: string;
    landmark: string;
    price: string;
    days: string;
    car_parking: string;
    swiming_pool: string;
    indoor_gym: string;
    date: string;
    air_condition: string;
    include: string;
    fridge: string;
    checked: boolean;
    attached_washroom: string;
    microwave: string;
    discription: string;
  }


  const selectCity = useSearchParams()
  let getCity = selectCity.get('city')
  const [selectedCity, setSelectedCity] = useState(getCity || "");


  useEffect(() => {
    if (!selectedCity) return;

    fetch(`https://traveltripo.com/travel-api/frontend/advanture-list-by-city.php?city=${selectedCity}`)
      .then((response) => response.json())
      .then((data) => {
        setHotelByCity(data.data);
        setAllHotels(data.data);
      });
  }, [selectedCity]);


  const [allHotels, setAllHotels] = useState<Hotel[]>([]);

  const [priceRangeOne, setPriceRangeOne] = useState(false);
  const [priceRangeTwo, setPriceRangeTwo] = useState(false);
  const [priceRangeThree, setPriceRangeThree] = useState(false);

  const [nearBusStand, setNearBusStand] = useState(false);
  const [nearRailway, setNearRailway] = useState(false);
  const [nearRiver, setNearRiver] = useState(false);
  const [nearMainCity, setMainCity] = useState(false);


  useEffect(() => {
    let filtered = allHotels.filter((item) => {
      const price = Number(item.price);

      // ✅ Price filter
      const priceMatch =
        (priceRangeOne && price >= 500 && price <= 1000) ||
        (priceRangeTwo && price > 1000 && price <= 5000) ||
        (priceRangeThree && price >= 5000 && price <= 30000);

      // ✅ Landmark filter
      const landmarkMatch =
        (nearBusStand && item.landmark === "near-bus-stand") ||
        (nearRailway && item.landmark === "near-railway-station") ||
        (nearRiver && item.landmark === "near-river") ||
        (nearMainCity && item.landmark === "main-city");

      // ✅ Final logic
      const noPriceSelected = !priceRangeOne && !priceRangeTwo && !priceRangeThree;
      const noLandmarkSelected = !nearBusStand && !nearRailway && !nearRiver && !nearMainCity;

      if (noPriceSelected && noLandmarkSelected) return true;

      if (noPriceSelected) return landmarkMatch;

      if (noLandmarkSelected) return priceMatch;

      return priceMatch && landmarkMatch;
    });

    setHotelByCity(filtered);

  }, [
    priceRangeOne,
    priceRangeTwo,
    priceRangeThree,
    nearBusStand,
    nearMainCity,
    nearRailway,
    nearRiver,
    allHotels
  ]);


  console.log("priceRangeOne", priceRangeOne)



  const router = useRouter();

  const bookingHandler = (id: string | number, price: number) => {
    router.push(`/advanture/detail?id=${id}&price=${price}`);
  };


  const crossHandler = () => {
    setFilter(false)
  }


  const filteHandler = () => {
    setFilter(!filter)
  }



  const [priceRange, setPriceRange] = useState("");

  // const filteredHotels = hotelByCity?.filter((item) => {
  //   if (!priceRange) return true; // no filter selected

  //   const [min, max] = priceRange.split("-").map(Number);
  //   return Number(item.price) >= min && Number(item.price) <= max;
  // });

  const [searchTerm, setSearchTerm] = useState('');



  const [currentPage, setCurrentPage] = useState(1);
  const itemsPerPage = 6;
  const filteredListings = hotelByCity.filter(item =>
    item.city?.toLowerCase().includes(searchTerm.toLowerCase())
  );

  const indexOfLastItem = currentPage * itemsPerPage;
  const indexOfFirstItem = indexOfLastItem - itemsPerPage;
  const currentItems = filteredListings.slice(indexOfFirstItem, indexOfLastItem);
  const totalPages = Math.ceil(filteredListings.length / itemsPerPage);

  const paginate = (pageNumber: number) => setCurrentPage(pageNumber);




  return (




    <div>



      <section>
        <div className="col-md-12 common-banner px-0">
          <img src="https://traveltripo.com//assets/images/com-img.jpg" alt="common banner" />
          <div className="common-context">
            <h1>Advanture Listing</h1>
            <span><a href="#" className="active">Home</a>  /  Listing</span>
          </div>

        </div>
      </section>


      <section>
        <div className="col-md-12 listingComtainer">
          <div className="container">
            <div className="row">
              <div className={`col-lg-3 hotelFilter px-5  ${filter ? 'filterShow' : 'filterHide'}`} >
                <div className="card-filter">
                  <h5>


                    Filter</h5>

                  <img src="../assets/images/crossIcon.png" alt="filter icon" onClick={crossHandler} className="crossIcon" />


                  <div className="px-20">
                    <div className="filter-group">
                      <label><strong>City</strong></label>
                      <div>
                        <input
                          type="radio"
                          name="city"
                          value="Rishikesh"
                          checked={selectedCity === "Rishikesh"}
                          onChange={(e) => setSelectedCity(e.target.value)}
                        />
                        Rishikesh
                      </div>

                      <div>
                        <input
                          type="radio"
                          name="city"
                          value="Mussoorie"
                          checked={selectedCity === "Mussoorie"}
                          onChange={(e) => setSelectedCity(e.target.value)}
                        />
                        Mussoorie
                      </div>

                      <div>
                        <input
                          type="radio"
                          name="city"
                          value="Nanital"
                          checked={selectedCity === "Nanital"}
                          onChange={(e) => setSelectedCity(e.target.value)}
                        />
                        Nanital
                      </div>

                      <div>
                        <input
                          type="radio"
                          name="city"
                          value="Manali"
                          checked={selectedCity === "Manali"}
                          onChange={(e) => setSelectedCity(e.target.value)}
                        />
                        Manali
                      </div>


                      <div>
                        <input
                          type="radio"
                          name="city"
                          value="Shimla"
                          checked={selectedCity === "Shimla"}
                          onChange={(e) => setSelectedCity(e.target.value)}
                        />
                        Shimla
                      </div>

                    

                     
                      <div>
                        <input
                          type="radio"
                          name="city"
                          value="Goa"
                          checked={selectedCity === "Goa"}
                          onChange={(e) => setSelectedCity(e.target.value)}
                        />
                        Goa
                      </div>

                      <div>
                        <input
                          type="radio"
                          name="city"
                          value="Kerala"
                          checked={selectedCity === "Kerala"}
                          onChange={(e) => setSelectedCity(e.target.value)}
                        />
                        Kerala
                      </div>

                      <div>
                        <input
                          type="radio"
                          name="city"
                          value="Kashmir"
                          checked={selectedCity === "Kashmir"}
                          onChange={(e) => setSelectedCity(e.target.value)}
                        />
                        Kashmir
                      </div>

                      <div>
                        <input
                          type="radio"
                          name="city"
                          value="Kerala"
                          checked={selectedCity === "Kerala"}
                          onChange={(e) => setSelectedCity(e.target.value)}
                        />
                        Kerala
                      </div>
                    </div>

                    <div className="filter-group">
                      <label><strong>By Price</strong></label>
                      <div><input type="checkbox" onChange={(e) => setPriceRangeOne(e.target.checked)} /> 500 To 1000</div>
                      <div><input type="checkbox" onChange={(e) => setPriceRangeTwo(e.target.checked)}
                      /> 1000 To 5000</div>
                      <div><input type="checkbox" onChange={(e) => setPriceRangeThree(e.target.checked)} /> 5000 To 30000</div>
                    </div>

                    <div className="filter-group">
                      <label><strong>Landmark</strong></label>
                      <div><input type="checkbox" onChange={(e) => setNearBusStand(e.target.checked)} /> Near Bus Stand</div>

                      <div><input type="checkbox" onChange={(e) => setNearRailway(e.target.checked)} /> Rear Railway Station</div>

                      <div><input type="checkbox" onChange={(e) => setNearRiver(e.target.checked)} /> Near River</div>

                      <div><input type="checkbox" onChange={(e) => setMainCity(e.target.checked)} /> Main City</div>
                    </div>
                    <button className="book-btn desk-filter">Filter</button>
                  </div>
                </div>
              </div>


              <div className="col-lg-9 mx-auto">
                <div className="col-lg-12 headDiv">
                  <div className="col-lg-9 mb-4 labelName pull-left px-0">
                    <h3>  <strong>({hotelByCity?.length || 0})</strong></h3>



                  </div>

                  <div className="col-lg-3 mb-3 pull-right px-0">

                    <select
                      className="form-control mt-15"
                      onChange={(e) => setPriceRange(e.target.value)}
                    >
                      <option value="">Filter by Price</option>
                      <option value="500-1000">500 to 1000</option>
                      <option value="1000-5000">1000 to 5000</option>
                      <option value="5000-25000">5000 to 25000</option>
                    </select>
                  </div>
                </div>






                <div className="row">

                  {
                    currentItems?.length > 0 ? (
                      currentItems.map((items) => {
                        const imagesArray = JSON.parse(items.images);

                        return (
                          <div className="col-md-4 card-sp" key={items.id}>
                            <div className="card-detail">
                              <div className="card-image">
                                <img
                                  src={`https://traveltripo.com/travel-api/admin/${imagesArray[0]}`}
                                  alt="Images"
                                />
                              </div>

                              <div className="card-info">
                                <div className="hotel-name"><b>{items.name}</b></div>
                                <div className="hotel-distance">
                                  <b><i className="fa fa-map-marker"></i> {items.city}</b>
                                </div>
                                <div className="hotel-price">
                                  <b>&#8377; {items.price}</b>
                                </div>

                                <div className="btnControl">
                                  <button className="book-btn" onClick={() => bookingHandler(items.id, Number(items.price))}>View Deatils</button>

                                  <button className="book-btn" onClick={() => bookingHandler(items.id, Number(items.price))}>Book Now</button>
                                </div>

                              </div>
                            </div>
                          </div>
                        );
                      })
                    ) : (
                      <div className="col-md-12 text-center mt-30">
                        <h4>No hotels found 😕</h4>
                        <p>Try changing price range or nearby location.</p>
                      </div>
                    )
                  }

                  {hotelByCity?.length >= 6 && (
                    <div className="d-flex justify-content-between align-items-center mt-3 paginationContent">
                      <nav className="col-lg-12 text-center">
                        <ul className="pagination pagination-sm mb-0">
                          <li className={`page-item ${currentPage === 1 && 'disabled'}`}>
                            <button
                              className="page-link"
                              onClick={() => paginate(currentPage - 1)}
                              disabled={currentPage === 1}
                            >
                              Previous
                            </button>
                          </li>

                          {Array.from({ length: totalPages }, (_, i) => (
                           <li key={i + 1} className={`page-item ${currentPage === i + 1 && 'active'}`}>
                              <a href="#"> <button onClick={() => paginate(i + 1)} className="page-link">
                                {i + 1}
                              </button></a>
                            </li>
                          ))}

                          <li className={`page-item ${currentPage === totalPages && 'disabled'}`}>
                          <a href="#"> <button
                              className="page-link"
                              onClick={() => paginate(currentPage + 1)}
                              disabled={currentPage === totalPages}
                            >
                              Next
                            </button></a>
                          </li>
                        </ul>
                      </nav>
                    </div>
                  )}
                </div>


              </div>




            </div>
          </div>
        </div>

      </section>

      <section>
        <div className="filterRecord" onClick={filteHandler}>
          <i className='fas fa-filter'></i>
        </div>
      </section>

    </div>

  );
}

export default Home;




