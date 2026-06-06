"use client";
import React from "react";
import { Suspense } from 'react';

import Header from '../../../src/header/header'
import Footer from '../../../src/footer/footer'
import ConfirmMessage from './message'
import '../confirm-booking/message.css'


function Message() {


  return (
    <div>
      <Header />
      <Suspense fallback={<div>Loading...</div>}>
      <ConfirmMessage/>
      </Suspense>
      <Footer />
    </div>
  );
}

export default Message;
