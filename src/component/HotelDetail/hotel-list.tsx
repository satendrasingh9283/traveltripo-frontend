// components/Home1.js
import React from "react";
import '../footer/footer.css'

function Footer() {
  return (
    <div>
      <footer>
        <div className="col-xs-12 col-sm-12 col-md-12 main-footer">
          <div className="container">
            <div className="row">

              <div className="col-md-3 inner-footer left-space">
                <h4>Company Links </h4>
                <ul>
                  <li><a href="/"> Home</a></li>
                  <li><a href="/about-us"> About us</a></li>
                  <li><a href="/car-list">Car Booking</a></li>
                  <li><a href="/list-property">List Property</a></li>
                  <li><a href="/contact"> Contact us</a></li>
                </ul>
              </div>
              <div className="col-md-3 inner-footer left-space">

                <ul>
                  <li>
                    <h4>Support</h4>
                  </li>
                  <li><a href="/rishikesh-packages"> Customer Support </a></li>
                  <li><a href="/mussoorie-package">Privacy & Policy  </a></li>
                  <li><a href="/shimla-packages">Contact us </a></li>

                </ul>
              </div>



              <div className="col-md-3 inner-footer left-space">
                <h4>Contact Info</h4>
                <ul className="social-btn">
                  <li><p>455 West tOrchard Street
                    Kings Mountain, NC 280867</p></li>


                  <li><i className="fa-classic fa-solid fa-envelope fa-fw"></i> <a href="#"> +91- 8869859984</a></li>
                  <li><i className="fa-classic fa-solid fa-square-phone fa-fw"></i> <a href="#"> needhelp@company.com</a></li>


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
                    <a href="https://www.twitter.com/" target="_blank">
                      <i className="fab fa-twitter" aria-hidden="true"></i>
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
                  <li><a href="about-us">About us</a></li>
                  <li><a href="privacy-policy">Privacy Policy</a></li>
                  <li><a href="sitemap.xml" target="_blank">Site Map</a></li>
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
