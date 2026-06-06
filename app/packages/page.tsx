// components/Home1.js
'use client';

import React from "react";
import Packages from './listing/listing'
import Header from '../../src/header/header'
import Footer from '../../src/footer/footer'
import { Suspense } from 'react';


function Holiday() {
  return (
    <div>
       <Header/>
      
       <Suspense fallback={<div>Loading...</div>}>
       <Packages/>
    </Suspense>
      <Footer/>
     
    </div>
  );
}

export default Holiday;