// components/Home1.js
import React from "react";
import '../footer/footer.css'
import Link from 'next/link'

function Footer() {
  return (
    <div>
      <footer>
        <img src="../assets/images/footer-img.jpg" alt="Footer Top Bg" className="footer-top-bg" />
        <div className="col-xs-12 col-sm-12 col-md-12 main-footer">
          <div className="container">
            <div className="row">

              <div className="col-md-6 inner-footer left-space">
             
                <ul>
                  <li><a href="/"> <h1 className="logo">TravelTripo</h1></a></li>
                  <li> <p className="pText">We specialize in offering the best hotel options, customized travel packages, and exciting adventure experiences tailored to your needs and budget. From luxury stays to budget-friendly hotels, romantic getaways to family vacations, and peaceful escapes to adrenaline-filled adventures—we curate every journey with care and expertise.</p>
                  </li>

                </ul>
              </div>



              <div className="col-md-3 inner-footer left-space">
                <h4>Contact Info</h4>
                <ul className="social-btn">
                  <li><i className="fa-classic fa-solid fa-location fa-fw"></i> <a href="#"> D23, Sector 62, Noida, UP</a></li>
                  <li><i className="fa-classic fa-solid fa-envelope fa-fw"></i> <a href="#"> +91- 8869859984</a></li>
                  <li><i className="fa-classic fa-solid fa-square-phone fa-fw"></i> <a href="#"> info@traveltripo.com</a></li>


                </ul>
              </div>

              <div className="col-md-3 inner-footer social-media left-space">

                <h4>Follow us</h4>

                <ul>

                  <li>
                    <a href="https://www.facebook.com/" target="_blank">
                      <i className="fab fa-facebook-f" aria-hidden="true"></i>
                    </a>
                  </li>
                  <li>
                    <a href="https://www.youtube.com/" target="_blank">
                      <i className="fab fa-youtube" aria-hidden="true"></i>
                    </a>
                  </li>
                  <li>
                    <a href="https://www.instagram.com/" target="_blank">
                      <i className="fab fa-instagram" aria-hidden="true"></i>
                    </a>
                  </li>
                  <li>
                    <a href="https://www.linkedin.com/" target="_blank">
                      <i className="fab fa-linkedin" aria-hidden="true"></i>
                    </a>
                  </li>


                </ul>
              </div>

            </div>
          </div>
        </div>
        <div className="col-xs-12 col-sm-12 col-md-12 copy-right text-left">
          <div className="container">
            <div className="row">
              <div className="col-xs-12 col-sm-12 col-md-6 text-left">
                <p>Copyright © 2015-2017 Traveltripo</p>
              </div>
              <div className="col-xs-12 col-sm-12 col-md-6 footer-links text-right">
                <ul>
                
                  <li><Link href="privacy">Privacy Policy</Link></li>
                  <li><Link href="sitemap.xml" target="_blank">Site Map</Link></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </footer>
    </div>
  );
}

export default Footer;
