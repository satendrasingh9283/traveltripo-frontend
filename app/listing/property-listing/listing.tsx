"use client";
import React, { useEffect, useState } from "react";
import '../property-listing/listing.css'

function Listing() {


  const [propertyListing, setPropertyListing] = useState<any>([]);

  const [name, setName] = useState<any>([]);
  const [email, setEmail] = useState<any>([]);
  const [mobile, setMobile] = useState<any>([]);
  const [property, setProperty] = useState<any>([]);
  const [city, setCity] = useState<any>([]);
  const [message, setMessage] = useState<any>([]);

  const formData = new FormData()
 
    formData.append('name', name)
    formData.append('email', email)
    formData.append('mobile', mobile)
    formData.append('property_type', property)
    formData.append('city', city)
    formData.append('message', message)
    console.log(formData,'formDatta---')

      const objjj = Object.fromEntries(formData)

      console.log(objjj,'plannnn')



  const listingHandler = () =>{
  
    fetch('https://traveltripo.com/travel-api/frontend/property_listing.php', {
      method: 'POST',
      body: formData
    })
      .then((responce) => console.log(responce.json()))
      // .then((data) => setPropertyListing(data.data))

  
  
  }



  return (




   






    <div>



      <section>
        <div className="col-md-12 common-banner px-0">
          <img src="../assets/images/com-img.jpg" alt="common banner" />
        </div>
      </section>


      <section>
        <div className="col-md-12">
          <div className="container">
            <div className="row">


              <div className="mx-auto">
           

                  <div className=" col-lg-6 col-md-12 col-sm-12 mb-3 booking-detail">
                        <h2>List Your Property</h2>
                        <div className=" mt-2">
                          <form action="#" method="POST">
                            <div className="row clearfix">

                              <div className="col-lg-12 col-md-12 col-sm-12 form-group">
                                <input type="text" name="username" onChange={(e)=>setName(e.target.value)} placeholder="Name *" />
                              </div>

                              <div className="col-lg-12 col-md-12 col-sm-12 form-group">
                                <input type="text" name="username"  onChange={(e)=>setEmail(e.target.value)}  placeholder="Email *" />
                              </div>

                              <div className="col-lg-12 col-md-12 col-sm-12 form-group">
                                <input type="text" name="username"   onChange={(e)=>setMobile(e.target.value)} placeholder="Mobile *" />
                              </div>

                              <div className="col-lg-12 col-md-12 col-sm-12 form-group">
                                <select  onChange={(e)=>setProperty(e.target.value)}>
                                  <option>Choose Property Type</option>
                                  <option>Hotels</option>
                                  <option>Packages</option>
                                  <option>Advanture</option>
                                </select>
                              </div>

                              

                              <div className="col-lg-12 col-md-12 col-sm-12 form-group">
                                <input type="text" name="username"  onChange={(e)=>setCity(e.target.value)} placeholder="City" />
                              </div>


                              <div className="col-lg-12 col-md-12 col-sm-12 form-group">
                                <textarea name="message"  onChange={(e)=>setMessage(e.target.value)} placeholder="Type Message"></textarea>
                              </div> 



                              <div className="col-lg-12 col-md-12 col-sm-12 form-group">

                                <button type="submit" className="booking-btn" onClick={()=>listingHandler()}>Book Now</button>

                              </div>

                            </div>
                          </form>

                        </div>
                      </div>


               
              </div>

            </div>
          </div>
        </div>

      </section>



    </div>

  );
}

export default Listing;




