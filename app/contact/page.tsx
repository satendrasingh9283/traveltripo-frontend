import Header from '../../src/header/header'
import Footer from '../../src/footer/footer'

import '../../app/contact/contact.css'

export default function AboutPage() {
  return (
    <div>
      <Header />


      <section>
        <div className="col-md-12 common-banner px-0">
          <img src="../assets/images/com-img.jpg" alt="common banner" />
        </div>
      </section>


      <section>
        <div className="col-md-12 mb-40 text-justify commonPage">
          <div className="container">
            <div className="row">
              <div className='text-center'>
              <h1 className='mb-3 commonHeading'>Contact Us</h1>
              </div>
             
              <section className="contact-section">
             
                <div className="contact-boxes">


                  <div className="contact-box">
                    <h3>Travel Booking Assistance</h3>
                    <p>
                      Need help booking flights, hotels, or travel packages?
                      Our travel experts are ready to assist you.
                    </p>
                    <div className="contact-info">
                      <span>📞 Phone: +91 8869859984</span>
                      <span>📧 Email: booking@traveltripo.com</span>
                      <span>🕒 Timing: 9 AM – 8 PM</span>
                    </div>
                 
                  </div>


                  <div className="contact-box">
                    <h3>Customer Support</h3>
                    <p>
                      Facing an issue during your trip or need support?
                      Our customer care team is available 24/7 for you.
                    </p>
                    <div className="contact-info">
                      <span>📞 Phone: +91 8869859984</span>
                      <span>📧 Email: support@traveltripo.com</span>
                      <span>🌍 Available: 24/7</span>
                    </div>
                 
                  </div>

                </div>
              </section>
            </div>
          </div>
        </div>
      </section>

      <Footer />
    </div>
  );
}