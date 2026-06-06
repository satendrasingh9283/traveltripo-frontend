import React from "react";
import { Suspense } from 'react';
import HotelDetail from './detail';
import Footer from '../../../src/footer/footer';
import Header from '../../../src/header/header'

function HotelsDetail() {
  return (
    <div>

      <Header />
      <Suspense fallback={<div>Loading...</div>}>
        <HotelDetail />
      </Suspense>
      <Footer />
    </div>
  );
}

export default HotelsDetail;
