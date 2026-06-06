// // components/Home1.js
// 'use client';
// import React from "react";
// import Advanture from './listing/listing'
// import Header from '../../src/header/header'
// import Footer from '../../src/footer/footer'
// import { Suspense } from 'react';
// import type { Metadata } from "next";
// export const metadata: Metadata = {
//   title: "Adventure Details | TravelTripo",
//   description: "View adventure package details.",
// };

// function AdvantureListing() {
  
//   return (
//     <div>
//         <Header/>
//         <Suspense fallback={<div>Loading...</div>}>
//         <Advanture/>
//     </Suspense>
      
//       <Footer/>
//     </div>
//   );
// }

// export default AdvantureListing;


import type { Metadata } from "next";
import { Suspense } from 'react';
import Advanture from './listing/listing'
import Header from '../../src/header/header'
import Footer from '../../src/footer/footer'


export const metadata: Metadata = {
  title: "Best Adventure Tours & Holiday Packages | TravelTripo",
  description: "Explore exciting adventure tours, trekking, camping, hill station trips, and affordable holiday packages with TravelTripo. Book your perfect travel experience today.",
};

export default function Page() {
  return (
    <div>
       <Header/>
         <Suspense fallback={<div>Loading...</div>}>
        <Advanture/>
    </Suspense>
      
      <Footer/>
    </div>
  );
}