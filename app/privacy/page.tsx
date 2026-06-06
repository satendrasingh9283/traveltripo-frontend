import Header from '../../src/header/header'
import Footer from '../../src/footer/footer'

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
              <h1 className='mb-3 commonHeading'>Privacy & Policy</h1>
              </div>

              <div className='cardBorder'>
                At TravelTripo, we respect your privacy and are committed to protecting the personal information you share with us. This Privacy Policy explains how we collect, use, disclose, and safeguard your information when you visit our website or use our services related to hotel bookings, customized travel packages, and adventure activities.

                <b>1. Information We Collect</b>

                <p>
                  We may collect the following types of information:

                  Personal Information: Name, email address, phone number, payment details, and travel preferences when you make inquiries or bookings.

                  Non-Personal Information: Browser type, IP address, device information, and website usage data to improve our services.

                  Cookies & Tracking Technologies: Used to enhance user experience and analyze website performance.
                </p>

                <b>2. How We Use Your Information</b>

                We use the collected information to:

                <p>
                Provide the best hotel options and customized travel packages

                Process bookings, payments, and customer support requests

                Personalize travel recommendations and adventure experiences

                Improve our website, services, and user experience

                Send updates, offers, and promotional communications (only if you opt in)
              </p>
              <b>3. Sharing of Information</b>

              <p>
                We do not sell or rent your personal information. We may share information with:

                Trusted hotel partners, travel operators, and adventure service providers for booking fulfillment

                Payment gateways for secure transactions

                Legal authorities if required by law
              </p>

              All third parties are obligated to protect your data.

              <b>4. Data Security</b>

              <p>
                We implement appropriate technical and organizational measures to protect your personal information from unauthorized access, misuse, or disclosure. While we strive to use commercially acceptable means to protect your data, no method is 100% secure.
              </p>
              <b>5. Your Privacy Rights</b>

              You have the right to:

              <p>
                Access, update, or delete your personal information

                Opt out of marketing communications

                Request information about how your data is used

                To exercise these rights, contact us using the details below.
              </p>
              <b>6. Third-Party Links</b>

              <p>
                Our website may contain links to third-party websites. We are not responsible for the privacy practices or content of such websites. Please review their privacy policies separately.
              </p>
              <b>7. Changes to This Policy</b>

              <p>
                We may update this Privacy Policy from time to time. Any changes will be posted on this page with an updated effective date.
              </p>

              <b>8. Contact Us</b>

              <b>If you have any questions or concerns about this Privacy Policy, please contact us:</b>

              Email: [info@traveltripo.com]
              Phone: [+91- 8869859984]
              Address: [D23, Sector 62, Noida]
            </div>

          </div></div>
        </div>
      </section >

      <Footer />
    </div >
  );
}