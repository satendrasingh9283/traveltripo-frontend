import React from "react";
import { Suspense } from 'react';
import PackagesDetail from './detail'; 
import Footer from '../../../src/footer/footer'
import Header from '../../../src/header/header'

function PackagsDetail() {
  return (
    <div>
      
      <Header/>
        <Suspense fallback={<div>Loading...</div>}>
       <PackagesDetail/>
       </Suspense>
       <Footer/>
    </div>
  );
}

export default PackagsDetail;
