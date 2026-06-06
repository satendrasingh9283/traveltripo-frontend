import React from "react";
import HotelListing from './listing/listing';
import { Suspense } from 'react';
import HotelDetail from './detail/detail';
import Header from '../../src/header/header'
import Footer from '../../src/footer/footer'

function Hotels() {
  return (
    <div>
      <Header/>
      <Suspense fallback={<div>Loading...</div>}>
      <HotelListing />
      </Suspense>
      <Footer/>
    </div>
  );
}

export default Hotels;
