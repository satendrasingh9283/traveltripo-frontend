"use client";
// components/Home1.js
import React, { useEffect, useState } from 'react';
import { useRouter } from 'next/navigation'

import '../home/home.css'
import Image from 'next/image'

function Home() {

  interface City {
    id: number;
    advanture_name: string;
    city: number;
  }

  interface Travel {
    id: number;
    property_type: string;
  }

  // const [citys, cityData] = useState([]);
  // const [property, propertyData] = useState([]);


  const [citys, cityData] = useState<City[]>([]);

  const [property, propertyData] = useState<Travel[]>([]);

  const [selectcity, setSelectCity] = useState<string>("");
  const [selectproperty, setSelectProperty] = useState<string>("");



  const selectedCity = selectcity


  console.log(selectedCity, 'seletedd')



  useEffect(() => {
    fetch('https://traveltripo.com/travel-api/frontend/city_list.php', {
      method: 'POST',
    })
      .then((responce) => responce.json())
      .then((data) => cityData(data.data))



    fetch('https://traveltripo.com/travel-api/frontend/travel_list.php', {
      method: 'POST',
    })
      .then((responce) => responce.json())
      .then((data) => propertyData(data.data))

  }, [])





  const router = useRouter()

  const searchHandler = (selectproperty: string) => {


    const nameHotel = "hotels";
    const namePackage = "packages";
    const nameAdvanture = "advanture";

    if (selectproperty === nameHotel) {
      router.push(`/hotels/?city=${selectedCity}`);

      // router.push(`/hotels/detail?id=${id}&price=${price}`);

    }
    else if (selectproperty === namePackage) {
      router.push(`/packages/?city=${selectedCity}`);
      console.log(selectproperty, "prooooo---");

    }
    else if (selectproperty === nameAdvanture) {
      router.push(`/advanture/?city=${selectedCity}`);

    }
    else {
      alert("Please Select");
    }

  };


/* top destination */
  const rishikeshHandler = () => {
    router.push(`/hotels/?city=Rishikesh`);
  }
  const mussoorieHandler = () => {
    router.push(`/hotels/?city=Mussoorie`);
  }
  const nanitalHandler = () => {
    router.push(`/hotels/?city=Nanital`);
  }
  const manaliHandler = () => {
    router.push(`/hotels/?city=Manali`);
  }
  const shimlaHandler = () => {
    router.push(`/hotels/?city=Shimla`);
  }
  const goaHandler = () => {
    router.push(`/hotels/?city=Goa`);
  }

/* all holiday */
  const holidayKashmirHandler = () => {
    router.push(`/packages/?city=Kashmir`);
  }
  const holidayLadhakHandler = () => {
    router.push(`/packages/?city=Ladhak`);
  }
  const holidayKeralaHandler = () => {
    router.push(`/packages/?city=Kerala`);
  }
  const holidayManaliHandler = () => {
    router.push(`/packages/?city=Manali`);
  }


  /* all advanture */
  // const holidayKashmirHandler = () => {
  //   router.push(`/packages/?city=Kashmir`);
  // }
  // const holidayLadhakHandler = () => {
  //   router.push(`/packages/?city=Ladhak`);
  // }
  // const holidayKeralaHandler = () => {
  //   router.push(`/packages/?city=Kerala`);
  // }
  // const holidayManaliHandler = () => {
  //   router.push(`/packages/?city=Manali`);
  // }



  return (


    <div>

      <section>
        <div className="col-md-12 main-slider">
          <span className="overlay"></span>
          <div id="myCarousel" className="carousel slide" data-ride="carousel">

            <div className="carousel-inner">
              <div className="item active">
                <img src="../assets/../assets/images/fe9b20812c3e34b19f05af537a8e6a07ec2ed233.png" alt="hotels" />
              </div>
            </div>
          </div>
        </div>



        <form className="navbar-form navbar-left searchbox1" role="search" name="f1">
          <span className='sliderOverlay'></span>
          <div className="col-md-12">
            <h1>Find Hotels, Holiday & Advanture </h1>
            <div className="card">
              <ul className="nav nav-tabs" role="tablist">
              </ul>

              <div className="tab-content">
                <div className="tab-pane active" id="home" role="tabpanel">
                  <div className="container-fluid bg-light">
                    <div className="row align-items-center justify-content-center">
                      <div className="col-md-4 px-0">
                        <div className="form-group w-100">
                          <select name="s1" className="form-control" onChange={(e) => setSelectCity(e.target.value)} aria-label="choose city">
                            <option selected>
                              Choose Travel City?
                            </option>


                            {
                              citys?.map((items) => (
                                <option key={items.city}>{items.city} </option>
                              ))
                            }


                          </select>

                        </div>
                      </div>
                      <div className="col-md-4 px-0">
                        <div className="form-group w-100">
                          <select name="s1" className="form-control filter-packages" onChange={(e) => setSelectProperty(e.target.value)}>
                            <option selected>
                              Choose?
                            </option>



                            <option value="hotels">Hotels & Resort</option>
                            <option value="packages">Holiday Packages</option>
                            <option value="advanture">Advanture Activities</option>


                            {/* {
                              property?.map((items) => (
                                <option key={items.property_type}>{items.property_type} </option>
                              ))
                            } */}

                          </select>
                        </div>
                      </div>
                      <div className="col-md-4 neww1 px-0">
                        <button className="btn btn-primary btn-block btn-primary1" onClick={() => searchHandler(selectproperty)} type="button">

                          Search
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </form>

      </section>



      <section id="section-top-destinations">
        <div className="container">
          <h2 className="section-title">Top Destination</h2>
          <div className="destinations-grid">

            <div className="destination-card" onClick={rishikeshHandler}>
              <img src="../assets/images/ed229a3359e1c9408f2f1fd317e17db08bb13b0e.png" alt="Rishikesh" className="card-bg" />
              <div className="card-overlay"></div>
              <div className="card-content">
                <h3>Rishikesh</h3>
                <div className="tag">20K Hotels</div>
              </div>
            </div>

            <div className="destination-card" onClick={mussoorieHandler}>
              <img src="../assets/images/b1d48f23ac20c8107e20fdecc8f58019f4c534f3.png" alt="Massurie" className="card-bg" />
              <div className="card-overlay"></div>
              <div className="card-content">
                <h3>Massurie</h3>
                <div className="tag">10K Hotels</div>
              </div>
            </div>

            <div className="destination-card" onClick={nanitalHandler}>
              <img src="../assets/images/60f52c0a80300425e8f2a1c2a27ef65187fd91d4.png" alt="Shimla" className="card-bg" />
              <div className="card-overlay"></div>
              <div className="card-content">
                <h3>Shimla</h3>
                <div className="tag">22K Hotels</div>
              </div>
            </div>

            <div className="destination-card" onClick={manaliHandler}>
              <img src="../assets/images/09534a8fc95bed4a5818af9307dec48dcfe46f3f.png" alt="Manali" className="card-bg" />
              <div className="card-overlay"></div>
              <div className="card-content">
                <h3>Manali</h3>
                <div className="tag">15K Hotels</div>
              </div>
            </div>

            <div className="destination-card" onClick={shimlaHandler}>
              <img src="../assets/images/37c908d57642aa8d93db61eef093c227372b4046.png" alt="Goa" className="card-bg" />
              <div className="card-overlay"></div>
              <div className="card-content">
                <h3>Goa</h3>
                <div className="tag">35K Hotels</div>
              </div>
            </div>


          </div>
        </div>
      </section>


      <section id="section-popular-holidays" >
        <div className="container">
          <h2 className="section-title">Popular Holiday</h2>
          <div className="popular-grid ">

            <div className="grid-col col-1">
              <div className="holiday-card large" onClick={holidayKashmirHandler}>
                <img src="../assets/images/2b889317a5daa07af3a638d7786847ac0ffceec8.png" alt="Kashmir" className="card-bg" />
                <div className="card-overlay-gradient"></div>
                <div className="holiday-info">
                  <img src="../assets/images/199_64.svg" alt="pin" />
                  <h3>Kashmir</h3>
                </div>
              </div>
            </div>


            <div className="grid-col col-2">
              <div className="holiday-card medium height-50 height1" onClick={holidayLadhakHandler}>
                <img src="../assets/images/65e35bae827b1c64299770037280ec5fefbf762b.png" alt="Leh Ladhak" className="card-bg height1" />
                <div className="card-overlay-gradient"></div>
                <div className="holiday-info">
                  <img src="../assets/images/199_68.svg" alt="pin" />
                  <h3>Leh Ladhak</h3>
                </div>
              </div>
              <div className="holiday-card medium height-50 height2" onClick={holidayKeralaHandler}>
                <img src="../assets/images/990a4d212093dbd55ae5f5cdfb4f7a3265c85c47.png" alt="Kerala" className="card-bg height2" />
                <div className="card-overlay-gradient"></div>
                <div className="holiday-info">
                  <img src="../assets/images/199_75.svg" alt="pin" />
                  <h3>Kerala</h3>
                </div>
              </div>
            </div>


            <div className="grid-col col-3">
              <div className="holiday-card large height-last" onClick={holidayManaliHandler}>
                <img src="../assets/images/50196225ace5e409f37e39eb269c010252bb93d7.jpg" alt="Manali" className="card-bg  height-last" />
                <div className="card-overlay-gradient"></div>
                <div className="holiday-info">
                  <img src="../assets/images/199_82.svg" alt="pin" />
                  <h3>Manali </h3>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section id="section-adventure">
        <div className="container">
          <h2 className="section-title">Adventure Activity</h2>
          <div className="adventure-row">

            <div className="adventure-item">
              <div className="icon-circle">
                <img src="../assets/images/202_108.svg" alt="Camping" />
              </div>
              <span>Camping</span>
            </div>

            <div className="adventure-item">
              <div className="icon-circle">
                <img src="../assets/images/202_125.svg" alt="Hiking" />
              </div>
              <span>Hiking</span>
            </div>

            <div className="adventure-item">
              <div className="icon-circle">
                <img src="../assets/images/202_130.png" alt="Bungee" />
              </div>
              <span>Bungee</span>
            </div>

            <div className="adventure-item">
              <div className="icon-circle">
                <img src="../assets/images/yoga.webp" alt="Rafting" />
              </div>
              <span>Yoga</span>
            </div>

            <div className="adventure-item">
              <div className="icon-circle">
                <img src="../assets/images/paraImg.jpeg" alt="Rafting" />
              </div>
              <span>Paragliding</span>
            </div>
          </div>
        </div>
      </section>
      <section id="section-international">
        <div className="container">
          <h2 className="section-title">Internation Destination</h2>
          <div className="destinations-grid">

            <div className="destination-card">
              <img src="../assets/images/destination-img2.webp" alt="Italy" className="card-bg" />
              <div className="card-overlay"></div>
              <div className="card-content-row">
                <h3>Itlay</h3>
                <div className="tag-pill">20K Hotels</div>
              </div>
            </div>

            <div className="destination-card">
              <img src="../assets/images/a8977299ecb2d01fcc6793e78378c67b86ad5d91.png" alt="Jordan" className="card-bg" />
              <div className="card-overlay"></div>
              <div className="card-content-row">
                <h3>Jordan</h3>
                <div className="tag-pill">20K Hotels</div>
              </div>
            </div>

            <div className="destination-card">
              <img src="../assets/images/b62f9c7f682302bc06ef3ee46912bb14eab81e5a.png" alt="Greece" className="card-bg" />
              <div className="card-overlay"></div>
              <div className="card-content-row">
                <h3>Greece</h3>
                <div className="tag-pill">20K Hotels</div>
              </div>
            </div>

            <div className="destination-card">
              <img src="../assets/images/f6e518de3af57ae9c99473b8b0cb7da3f4dd88c4.png" alt="Japan" className="card-bg" />
              <div className="card-overlay"></div>
              <div className="card-content-row">
                <h3>Japan</h3>
                <div className="tag-pill">20K Hotels</div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <section id="section-testimonials">
        <div className="testimonial-container">
          <div className="testimonial-images">

            <img src="../assets/images/49e6ad8a05a6878fced2266beb4e6443d2c80b88.png" alt="Background" className="testi-bg-img" />

            <div className="testi-fg-wrapper">
              <div className="decor-rect-v"></div>
              <div className="decor-rect-h"></div>
              <img src="../assets/images/8b66fee01cc12c5ef288046b78eaf5893d50e20d.png" alt="Customer" className="testi-fg-img" />
            </div>
          </div>
          <div className="testimonial-content">
            <h4><span className='textRed'>What Customer</span> Say About Us</h4>
            <p className="quote">"This was the most amazing trip of my life! Everything was perfectly organized – hotels, transport, and adventure activities. Highly recommended for stress-free travel."</p>
            <div className="author">
              <h5>Pooja Shrama</h5>
              <span>Software Engineer</span>
            </div>Bungee

          </div>
        </div>
      </section>
      <section id="section-blog">
        <div className="container">
          <h2 className="section-title">Latest Blog</h2>
          <div className="blog-row">

            <div className="blog-item">
              <div className="blog-img-wrapper">
                <img src="../assets/images/239_33.svg" alt="Shimla" className="blog-img" />
              </div>
              <div className="blog-info">
                <div className="red-line"></div>
                <h3>Shimla</h3>
              </div>
            </div>

            <div className="blog-item">
              <div className="blog-img-wrapper">
                <img src="../assets/images/239_39.svg" alt="Manali" className="blog-img" />
              </div>
              <div className="blog-info">
                <div className="red-line"></div>
                <h3>Manali</h3>
              </div>
            </div>

            <div className="blog-item">
              <div className="blog-img-wrapper">
                <img src="../assets/images/239_43.svg" alt="Ladhak" className="blog-img" />
              </div>
              <div className="blog-info">
                <div className="red-line"></div>
                <h3>Ladhak</h3>
              </div>
            </div>

            <div className="blog-item">
              <div className="blog-img-wrapper">
                <img src="../assets/images/239_46.svg" alt="Goa" className="blog-img" />
              </div>
              <div className="blog-info">
                <div className="red-line"></div>
                <h3>Goa</h3>
              </div>
            </div>

            <div className="blog-item">
              <div className="blog-img-wrapper">
                <img src="../assets/images/239_55.svg" alt="Kerala" className="blog-img" />
              </div>
              <div className="blog-info">
                <div className="red-line"></div>
                <h3>Kerala</h3>
              </div>
            </div>
          </div>
        </div>
      </section>

    </div>

  );
}

export default Home;
