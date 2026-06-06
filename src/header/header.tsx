"use client"
import React from "react";
import '../header/header.css'
import Image from 'next/image';
import Link from 'next/link'

function Header() {



  const toggleMenuHandler = () => {
    const rightMenu = document.querySelector('.rightMenu')
    rightMenu?.classList.remove('menu-close')
    console.log(rightMenu);
  }

  const menuOverlayHander = () => {
    const rightMenu = document.querySelector('.rightMenu')
    rightMenu?.classList.remove('menu-open')
    rightMenu?.classList.add('menu-close')

  }

  return (
    <div>
      <header>
        <div className="col-lg-12 top-header">
          <div className="container">
            <div className="row">
              <div className="col-6 col-lg-6 top-none">
                <p className="textleft">Mail:- info@traveltripo.com</p>
              </div>
              <div className="col-12 col-lg-6 text-right">
                <p>Call us: +91-8869859984 Time: 9:30AM to 7:00 PM</p>
              </div>
            </div>
          </div>
        </div>

        <div className="col-md-12 main-header">
          <div className="container">
            <div className="row">
              <div className="col-md-3">

                <a className="navbar-brand company-logo meee" href="/">
                  <img src="https://traveltripo.com/assets/images/logo.png" alt="Logo " />
                </a>
              </div>

              <div className="col-md-9">

                <nav className="navbar">
                  <ul className="menu">

                    {/* <li><Link href="/hotels">Hotels</Link></li>
                    <li><a href="#">Holiday Packages</a></li>
                    <li><a href="#">Advature Activity</a></li>
                    <li><a href="#">Car Service</a></li> */}
                    <li><Link href="/listing" className="listing-btn">Property Listing</Link></li>
                    <div onClick={toggleMenuHandler}> <img src="https://traveltripo.com/assets/images/menuIcon.png" className="toggleMenu" /></div>
                  </ul>
                </nav>
              </div>
            </div>
          </div>
        </div>
      </header>
      
      <div className="rightMenu menu-close">
      <div className="menuOverlay" onClick={menuOverlayHander}></div>
        <h1>Menu</h1>
        <ul>
        <Link href="/"><li>Home</li></Link>
        <Link href="/about"><li>About</li></Link>
        <Link target="_blank" href="https://www.blogger.com/u/2/blog/posts/3565554926312533438?hl=en-GB"><li>Blog</li></Link>
        <Link href="/contact"><li>Contact</li></Link>
        </ul>
      </div>
    </div >
  );
}

export default Header;
