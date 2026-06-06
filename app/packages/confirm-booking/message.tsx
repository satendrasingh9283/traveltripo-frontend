"use client";
import React from "react";
import { useRouter } from 'next/navigation'; // Next.js 13+
import { useEffect, useState } from 'react';
import { Suspense } from 'react';

import Header from '../../../src/header/header'
import Footer from '../../../src/footer/footer'
import '../confirm-booking/message.css'
import { useSearchParams } from 'next/navigation';

function Message() {
  const router = useRouter();


  const searchParams = useSearchParams();


  const id = searchParams.get('id');

  interface RoomData {
    id: string;
    amount: number;
    title: string;
    price: number;
    address: string;
    days: string;
    microwave: string;
    car_parking: string;
    swiming_pool: string;
    indoor_gym: string;
    images?: string | string[]; // ✅ Add this line
    description: string;
    policy: string;
    map?: string;
    property_for: string;
    discription: string;
    landmark: string;
    number: string;
    include: string;
    name: string;
  }


  const [alldata, setAllData] = useState<RoomData | null>(null);


  console.log("Booking ID:", alldata);

  useEffect(() => {

    fetch(`https://traveltripo.com/travel-api/frontend/package-detail.php?id=${id}`,
      {
        method: "GET",
      }).then((responce) => responce.json())
      .then((data) => setAllData(data.data))
  }, [id],)

  const backHandler = () => {
    router.push('/');
  };

  const imagesArray =
  typeof alldata?.images === "string"
    ? JSON.parse(alldata.images)
    : [];

const firstImage = imagesArray[0];


  return (
    <div>

      <div>
        <section>
          <div className="col-md-12 common-banner px-0">
            <img src="https://traveltripo.com/assets/images/com-img.jpg" alt="common banner" />
          </div>
        </section>
        <div className="msg-icon">
          <div className="container">
            <img src="https://traveltripo.com/assets/images/checkIcon1.png" className="img" alt="message icon" />
            <h1>Booking completed successfully!</h1>

            <div className="mx-auto booking-card">
              <div className="card">
                <div className="card-header">
                  <span className="id"><b className="hotelId">Booking ID:-</b> <span className="idName">#{alldata?.id}</span></span>
                  <span className="badge bg-warning text-dark">Pay at Hotel</span>
                </div>
                <div className="card-body">

                  <img
                    src={`https://traveltripo.com/travel-api/admin/${firstImage}`} // ✅ Use the first image from the array
                    alt="Images" className="htImg"
                  />

                  <h3 className="hotel-name">{alldata?.name}</h3>
                  <p className="address">{alldata?.address}</p>
                  <p className="days"><span>{alldata?.days} Days</span></p>
                  <div className="actions">

                    <a href={`tel:${alldata?.number}`}><button className="btn call-btn">

                      <img src="https://traveltripo.com/assets/images/callIcon.png" className="img" alt="message icon" />
                    </button></a>

                    <button type="submit"
                      className="btn direction-btn"
                      onClick={() => window.open(alldata?.map, "_blank")}
                    >
                      <img src="https://traveltripo.com/assets/images/mapIcon.png" className="img" alt="message icon" />
                    </button>
                  </div>
                </div>
              </div>
            </div>

            {/* <button className="book-btn" onClick={backHandler}>Back To Home</button> */}
          </div>
        </div>

      </div>

    </div>
  );
}

export default Message;
