'use client';
import React from "react";
import { useRouter } from 'next/navigation';
import type { Metadata } from "next";
import '../detail/detail.css'
import Image from 'next/image'
// import { useRouter } from 'next/router';
// import commonBanner from '../../../public/assets/images/com-img.jpg'
import hotelImg from '../../../public/assets/images/hotel-img.jpg'
import videoImg from '../../../public/assets/images/video-icon.svg'
import reviewImg from '../../../public/assets/images/author-1.jpg'
import { useSearchParams } from 'next/navigation';
import { useEffect, useState } from 'react';

export const metadata: Metadata = {
  title: "Best Adventure Tours & Holiday Packages | TravelTripo",
  description: "Explore exciting adventure tours, trekking, camping, hill station trips, and affordable holiday packages with TravelTripo. Book your perfect travel experience today.",
  keywords: [
    "adventure tours",
    "holiday packages",
    "travel packages",
    "trekking trips",
    "camping tours",
    "weekend getaways",
    "budget travel packages",
    "family holiday trips",
    "india adventure travel",
    "tour packages",
    "TravelTripo",
  ],
};

function HotelDetail() {

  interface RoomData {
    id: string;
    advanture_name: string;
    transport: string;
    advanture_type: string;
    images?: string | string[]; // ✅ Add this line
    description: string;
    privacy: string;
    property_for: string;
    discription: string;
    video: string;
    landmark: string;
    price: string;
    include: string;
    name: string;
  }


  interface Review {
    review_name: string;
    review_rating: string;
    review_comment: string;
    review_date: string;
  }


  const [alldata, setAllData] = useState<RoomData | null>(null);


  let nextPageId = alldata?.id

  //   id
  // name
  // city
  // address
  // map
  // price

  const [data, setData] = useState<any>(null);



  const [bookingDetails, setBookingDetails] = useState([]);

  const [bookingNow, setbookingNow] = useState(false);

  const [stripItem, setstripItem] = useState(false);

  const [addReview, setAddReview] = useState([]);
  const [reviewList, setReviewList] = useState<Review[]>([]);




  const [name, setName] = useState('')
  const [email, setEmail] = useState('')
  const [checkin_date, setCheckin_Date] = useState('')
  const [no_of_person, setNo_of_Person] = useState('')
  const [room_type, setRoom_Type] = useState('')
  const [amount, setAmount] = useState('')
  const [status, setStatus] = useState('1')

  const [pre_price, setPre_Prive] = useState('1')

  const [review_name, setReviewName] = useState('')
  const [review_email, setReviewEmail] = useState('')
  const [review_rating, setReviewRating] = useState('2025-05-27')
  const [review_date, setReviewDate] = useState('')
  const [review_comment, setReviewComment] = useState('')

  const reviewformdata = new FormData()
  reviewformdata.append('name', review_name)
  reviewformdata.append('email', review_name)
  reviewformdata.append('rating', review_rating)
  reviewformdata.append('date', review_date)
  reviewformdata.append('comment', review_comment)

  const formdata = new FormData()
  formdata.append('name', name)
  formdata.append('email', email)
  formdata.append('checkin_date', checkin_date)
  formdata.append('no_of_person', no_of_person)
  formdata.append('room_type', room_type)
  formdata.append('amount', amount)
  formdata.append('amount', amount)
  formdata.append('status', status)




  const [loading, setLoading] = useState(true);

  const [hideItem1, sethideItem1] = useState(true);
  const [hideItem2, sethideItem2] = useState(true);
  const [hideItem3, sethideItem3] = useState(true);
  const [hideItem4, sethideItem4] = useState(true);
  const [hideItem5, sethideItem5] = useState(true);
  const [hideItem6, sethideItem6] = useState(true);
  const [hideItem7, sethideItem7] = useState(true);

  const searchParams = useSearchParams();
  const id = searchParams.get('id');
  const price = searchParams.get('price');




  useEffect(() => {

    fetch(`https://traveltripo.com/travel-api/frontend/advanture-detail.php?id=${id}`,
      {
        method: "GET",
      }).then((responce) => responce.json())
      .then((data) => setAllData(data.data))

    setPre_Prive(price ?? "")
    setAmount(price ?? "")

    fetch(`https://traveltripo.com/travel-api/frontend/review-list.php`,
      {
        method: "GET",
      }).then((responce) => responce.json())
      .then((data) => setReviewList(data.data))

  }, [id, price],)


  useEffect(() => {
    if (!alldata) {
      sethideItem1(false);
      sethideItem2(false);
      sethideItem3(false);
      sethideItem4(false);
      sethideItem5(false);
      sethideItem6(false);
      sethideItem7(false);
      return;
    }

    // sethideItem1(alldata.air_condition === "No");
    // sethideItem2(alldata.fridge === "No");
    // sethideItem3(alldata.attached_washroom === "No");
    // sethideItem4(alldata.microwave === "No");
    // sethideItem5(alldata.car_parking === "No");
    // sethideItem6(alldata.swiming_pool === "No");
    // sethideItem7(alldata.indoor_gym === "No");

  }, [alldata]);


  const router = useRouter();

  // id: string | number, price: number, name: string, address: string, map: string | number, number: number

  // const bookingHandler = () => {
  //   fetch(`https://traveltripo.com/travel-api/admin/booking-list.php`,
  //     {
  //       method: "POST",
  //       body: formdata,
  //     }).then((responce) => responce.json())
  //     .then((data) => setBookingDetails(data.data))
  //     // alert("Confirmed Booking")
  //     setstripItem(true)
  //     router.push(`/hotels/confirm-booking?id=${nextPageId}`);

  // }
  const bookingHandler = () => {
    console.log(formdata, 'formData---booking')
    fetch(`https://traveltripo.com/travel-api/admin/advanture-booking.php`,
      {
        method: "POST",
        body: formdata,
      }).then((responce) => responce.json())
      .then((data) => {
        console.log(data, 'data coming')
        setBookingDetails(data.data)
        router.push(`/hotels/confirm-booking?id=${nextPageId}`);
        // setstripItem(true)
      }
      )
  }

  // useEffect(() => {
  //   bookingHandler()
  // }, []);


  const addReviewHandler = () => {
    alert('Do You Want to Add Review')
    fetch(`https://traveltripo.com/travel-api/frontend/add-review.php`,
      {
        method: "POST",
        body: reviewformdata,
      }).then((responce) => responce.json())
      .then((data) => {
        setAddReview(data.data)
        if (data.success) {
          setReviewName("")
          setReviewEmail("")
          setReviewRating("")
          setReviewDate("")
          setReviewComment("")
        }
        else {
          console.error("Review not added:", data);
        }

      })

  }


  //   useEffect(() => {
  //   if (window.innerWidth <= 768) {
  //     setbookingNow(true);

  //   }
  // },[])


  const booknowHandler = () => {
    setbookingNow(true)
    setstripItem(true)
  }

  const crossHandlerDetail = () => {
    setbookingNow(false)
    setstripItem(false)
  }





  return (


    <>



      {/* <section>
        <div className="col-md-12 common-banner px-0">
          <img src="https://traveltripo.com/assets/images/com-img.jpg" alt="common banner" />
        </div>
      </section> */}

      <section>
        <div className="col-md-12 common-banner px-0">
          <img src="https://traveltripo.com//assets/images/com-img.jpg" alt="common banner" />
          <div className="common-context">
            <h1>Advanture Details</h1>
            <span><a href="#" className="active">Home</a>  /  Details</span>
          </div>

        </div>
      </section>





      <section>
        <div className="col-lg-12">
          <div className="container">
            <div className="row">


              <div className="col-lg-8">
                <div className="row">
                  <div className="col-md-12 card-sp">
                    <div className="card-detail">
                      <div className="card-image">
                        <div id="myCarousel9" className="carousel slide" data-ride="carousel">
                          <div className="carousel-inner">




                            {/* {alldata?.images && (
                            (typeof alldata.images === 'string' ? JSON.parse(alldata.images) : alldata.images).map((img, index) => (
                              <div className={`item ${index === 0 ? 'active' : ''}`} key={index}>
                                <img
                                  src={`https://traveltripo.com/travel-api/admin/uploads/${img}`}
                                  alt={`Image ${index + 1}`}
                                />
                              </div>
                            ))
                          )} */}

                            {
                              alldata?.images &&
                              (
                                (typeof alldata.images === 'string'
                                  ? JSON.parse(alldata.images)
                                  : alldata.images) as string[]
                              ).map((img: string, index: number) => (
                                <div className={`item ${index === 0 ? 'active' : ''}`} key={index}>
                                  <img
                                    src={`https://traveltripo.com/travel-api/admin/${img}`}
                                    alt={`Room image ${index}`}
                                  />
                                </div>
                              ))
                            }

                          </div>
                          <a className="left carousel-control" href="#myCarousel9" data-slide="prev">
                            <span className="glyphicon glyphicon-chevron-left"></span>
                            <span className="sr-only">Previous</span>
                          </a>
                          <a className="right carousel-control" href="#myCarousel9" data-slide="next">
                            <span className="glyphicon glyphicon-chevron-right"></span>
                            <span className="sr-only">Next</span>
                          </a>

                        </div>
                      </div>

                    </div>
                  </div>




                </div>
              </div>
              <div className={`col-md-4 bookingMob card-sp px-0 ${bookingNow ? 'bookingShow' : 'bookingHide'}`}>
                <div className="booking-form">
                  <h2>Book Your Hotel?</h2>
                  <img src="https://traveltripo.com/assets/images/crossIcon.png" alt="filter icon" onClick={crossHandlerDetail} className="crossIcon" />
                  {/* <formZ  action={`/hotels/confirm-booking?id=${nextPageId}`} method="POST"> */}
                  {/* action={`/hotels/confirm-booking?id=${nextPageId}`}  */}

                  <div className="clearSpace">
                    <h1>&#8377;3000 <small className="discountText"><span className="lastDate">4999&#8377;</span>  10% Off</small></h1>
                    <label>Name</label>
                    <input type="text" id="name" className="form-control" name="name" required onChange={(e) => setName(e.target.value)} placeholder="Name" />

                    <label>Email</label>
                    <input type="email" id="email" name="email" className="form-control" onChange={(e) => setEmail(e.target.value)} placeholder="Email " />

                    <label>Advanture Date</label>
                    <input type="date" id="checkin" className="form-control" name="checkin" onChange={(e) => setCheckin_Date(e.target.value)} />




                    <label>Number of Person</label>
                    <input type="number" id="guests" className="form-control" name="guests" onChange={(e) => setNo_of_Person(e.target.value)} min="1" max="10" />

                    <label>No of Advanture</label>
                    <select id="room" name="room" className="form-control" onChange={(e) => setRoom_Type(e.target.value)} >
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5+">5+</option>
                    </select>



                    <div className="form-group mb-3">
                      <div className="totle-amount"><h4><strong>Total Amount = </strong><span className="finalPrice">{pre_price} Rs</span> </h4></div>
                    </div>
                    <button type="submit" onClick={() => bookingHandler()}>Book Now <small>( Pay Later )</small></button>
                  </div>

                </div>
              </div>

              <div className="col-md-12 mobclear">
                <div className="tourdetail-tabs tabs-box">


                  <ul className="tab-btns tab-buttons clearfix">
                    <li data-tab="#tour-description" className="tab-btn active-btn"><p><img src="/assets/images/tabIcon1.png" /> <span className="tabText">Overview</span></p></li>
                    <li data-tab="#tour-included" className="tab-btn"><p><img src="/assets/images/tabIcon2.png" /> <span className="tabText">Amenities</span></p></li>
                    <li data-tab="#tour-plan" className="tab-btn"><p><img src="/assets/images/tabIcon3.png" /> <span className="tabText">Map</span></p></li>
                    <li data-tab="#tour-map" className="tab-btn"><p><img src="/assets/images/tabIcon4.png" /> <span className="tabText">Policies</span></p></li>
                    <li data-tab="#tour-review" className="tab-btn"><p><img src="/assets/images/tabIcon5.png" /> <span className="tabText">Reviews</span></p></li>
                  </ul>



                  <div className="tabs-content">


                    <div className="tab active-tab" id="tour-description">

                      <div className="content">
                        <h3>Overview</h3>
                        <div className="row clearfix">

                          <div className="column col-lg-12 col-md-12 col-sm-12">

                            <p>

                              <p>{alldata?.description || 'No description available'}</p>
                            </p>
                          </div>



                        </div>
                      </div>




                      <div className="content">
                        <h3 className="pt-0">Included</h3>
                        <div className="row clearfix">

                          <div className="column col-lg-12 col-md-12 col-sm-12">
                            <ul className="tour-detail_lists-two">
                              <li className={`${hideItem1 ? 'hideLabel' : 'showLabel'}`}><label><img src="/assets/images/adv1.png" /> Advanture Name </label> <span className="hideItem">{alldata?.advanture_name}</span></li>
                              <li className={`${hideItem3 ? 'hideLabel' : 'showLabel'}`}><label><img src="/assets/images/adv2.png" /> Advanture Type</label> <span className="hideItem">{alldata?.advanture_type}</span></li>
                              <li className={`${hideItem4 ? 'hideLabel' : 'showLabel'}`}><label><img src="/assets/images/am5.png" /> Transport</label>  <span className="hideItem">{alldata?.transport}</span></li>


                            </ul>
                          </div>

                        </div>
                      </div>


                      {alldata?.video === null ?
                        (
                          <div className="content">

                            <div className="tour-detail_map">
                              <h3 className="pt-0">Video</h3>

                              {
                                <iframe className="map" src={alldata?.video}></iframe>

                              }

                            </div>
                          </div>
                        ) :
                        (
                          ""
                        )


                      }


                      {alldata?.privacy === null ?
                        (
                          <div className="content">

                            <div className="tour-detail_map">
                              <h3 className="pt-0">Video</h3>

                              {
                                <iframe className="map" src={alldata?.privacy}></iframe>

                              }

                            </div>
                          </div>
                        ) :
                        (
                          ""
                        )


                      }



                      {alldata?.privacy === null ?
                        (
                           <div className="content">
                        {Array.isArray(reviewList) && reviewList.length > 0 && (
                          <h3>Reviews ({reviewList.length})</h3>
                        )}



                        <div className="autoScoll">

                          {reviewList?.map((items) => (



                            <div className="rating-box_one">
                              <div className="rating-box_one-author">
                                {/* <Image src={reviewImg} alt="review" /> */}
                                {
                                  <h3> {items.review_name?.charAt(0)}</h3>
                                }
                              </div>
                              <div className="rating-box_one-inner">

                                <h6>{items.review_name}</h6>

                                <div className="rating-box_one-date">
                                  <i className="fa-classic fa-solid fa-calendar-days fa-fw"></i> {items.review_date}</div>
                                <ul className="rating-box_one-review">



                                  <li className={items.review_rating === "1" ? 'reviewShow' : 'reviewHide'}>
                                    <span className="fa-classic fa-solid fa-star fa-fw"></span>
                                  </li>

                                  <li className={items.review_rating === "2" ? 'reviewShow' : 'reviewHide'}>
                                    <span className="fa-classic fa-solid fa-star fa-fw"></span>
                                    <span className="fa-classic fa-solid fa-star fa-fw"></span>
                                  </li>

                                  <li className={items.review_rating === "3" ? 'reviewShow' : 'reviewHide'}>
                                    <span className="fa-classic fa-solid fa-star fa-fw"></span>
                                    <span className="fa-classic fa-solid fa-star fa-fw"></span>
                                    <span className="fa-classic fa-solid fa-star fa-fw"></span>
                                  </li>

                                  <li className={items.review_rating === "4" ? 'reviewShow' : 'reviewHide'}>
                                    <span className="fa-classic fa-solid fa-star fa-fw"></span>
                                    <span className="fa-classic fa-solid fa-star fa-fw"></span>
                                    <span className="fa-classic fa-solid fa-star fa-fw"></span>
                                    <span className="fa-classic fa-solid fa-star fa-fw"></span>
                                  </li>
                                  <li className={items.review_rating === "5" ? 'reviewShow' : 'reviewHide'}>
                                    <span className="fa-classic fa-solid fa-star fa-fw"></span>
                                    <span className="fa-classic fa-solid fa-star fa-fw"></span>
                                    <span className="fa-classic fa-solid fa-star fa-fw"></span>
                                    <span className="fa-classic fa-solid fa-star fa-fw"></span>
                                    <span className="fa-classic fa-solid fa-star fa-fw"></span>
                                  </li>


                                </ul>
                                <div className="rating-box_one-text">{items.review_comment}</div>
                              </div>
                            </div>


                          ))}
                        </div>
                      </div>
                        ) :
                        (
                          ""
                        )


                      }



                     

                      <div className="content">
                        <div className="comment-box card">
                          <div className="row clearfix">

                            <div className="column col-lg-12 col-md-12 col-sm-12">
                              <h2>Write a Review</h2>
                              <div className="text">Your email address will not be published.  fields are marked *</div>
                              <div className="comment-form">
                                <form action="#" method="POST">
                                  <div className="row clearfix">

                                    <div className="col-lg-4 col-md-6 col-sm-12 form-group">
                                      <input type="text" name="username" onChange={(e) => setReviewName(e.target.value)} placeholder="Name *" />
                                    </div>

                                    <div className="col-lg-4 col-md-6 col-sm-12 form-group">
                                      <input type="text" name="username" onChange={(e) => setReviewEmail(e.target.value)} placeholder="Email *" />
                                    </div>

                                    <div className="col-lg-4 col-md-6 col-sm-12 form-group">
                                      <input type="text" name="username" onChange={(e) => setReviewRating(e.target.value)} placeholder="Rating *" />
                                    </div>

                                    <div className="col-lg-12 col-md-12 col-sm-12 form-group">
                                      <textarea name="message" onChange={(e) => setReviewComment(e.target.value)} placeholder="Comment"></textarea>
                                    </div>



                                    <div className="col-lg-12 col-md-12 col-sm-12 form-group">


                                      <button type="submit" className="commnent-btn" onClick={() => addReviewHandler()}>Post Commant</button>
                                    </div>

                                  </div>
                                </form>

                              </div>
                            </div>


                          </div>
                        </div>

                      </div>

                    </div>
                  </div>
                </div>
              </div>

              <div className={`bookingStrip ${stripItem ? 'hide' : 'show'}`}>
                <p>Total Amount</p>
                <b>₹ 5000</b>
                <button type="submit" className="commnent-btn" onClick={booknowHandler}>Book Now</button>
              </div>

            </div>
          </div>
        </div>
      </section>


    </>

  );
}

export default HotelDetail;




