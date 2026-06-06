import React from "react";
import Header from '../../src/header/header'
import Footer from '../../src/footer/footer'
import PropertListing from "../listing/property-listing/listing";

function Listing() {
  return (
    <div>
      <Header />
      <PropertListing />
      <Footer />
    </div>
  );
}

export default Listing;
