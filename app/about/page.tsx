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
             <h1 className='mb-3 commonHeading'>About Us</h1>
             </div>

              <div className='cardBorder'>
              <p><strong>At TravelTripo</strong>, we believe travel is not just about reaching a destination—it’s about creating unforgettable experiences. We are your trusted travel partner, dedicated to helping you explore the world with comfort, excitement, and confidence. Whether you’re planning a relaxing holiday, a thrilling adventure, or a perfectly organized trip, TravelTripo is here to make it seamless and memorable.</p>


              <p>We specialize in offering the best hotel options, customized travel packages, and exciting adventure experiences tailored to your needs and budget. From luxury stays to budget-friendly hotels, romantic getaways to family vacations, and peaceful escapes to adrenaline-filled adventures—we curate every journey with care and expertise.</p>

              <p>Our travel packages are thoughtfully designed to give you maximum value, flexibility, and authentic experiences. We work closely with reliable hotel partners, local guides, and service providers to ensure high-quality standards, comfort, and safety at every step of your journey. Whether it’s a domestic trip or an international escape, we focus on smooth planning and stress-free travel.</p>

              <p>For adventure lovers, TravelTripo opens the door to thrilling experiences like trekking, camping, water sports, wildlife tours, and offbeat destinations. We believe adventure should be exciting yet safe, so every activity is planned with expert guidance and proper arrangements.</p>

              <p>What sets TravelTripo apart is our customer-first approach. We listen to your travel dreams and turn them into reality with personalized solutions, transparent pricing, and dedicated support before, during, and after your trip.</p>

              <p>With TravelTripo, you don’t just book a trip—you create memories that last a lifetime.
                Travel smart. Travel happy. TravelTripo.</p>
              </div>

            </div>
          </div>
        </div>
      </section>

      <Footer />
    </div>
  );
}